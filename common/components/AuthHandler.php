<?php
namespace common\components;

use common\models\Auth;
use common\models\User;
use Yii;
use yii\authclient\ClientInterface;
use yii\authclient\clients\VKontakte;
use yii\helpers\ArrayHelper;

/**
* AuthHandler handles successful authentication via Yii auth component
*/
class AuthHandler
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function handle()
    {
        $attributes = $this->client->getUserAttributes();
        $id = ArrayHelper::getValue($attributes, 'id');

        /* @var Auth $auth */
        $auth = Auth::find()->where([
            'source' => $this->client->getId(),
            'source_id' => $id,
        ])->one();

        if ($auth) {
            /* @var User $user */
            $user = $auth->user;
            Yii::$app->user->login($user, Yii::$app->params['user.rememberMeDuration']);
        } else {
            if($this->client instanceof VKontakte) {
               $user = $this->vkSettings($attributes);
            }

            $transaction = User::getDb()->beginTransaction();

            if ($user->save()) {
                $auth = new Auth([
                    'user_id' => $user->id,
                    'source' => $this->client->getId(),
                    'source_id' => (string)$id,
                ]);
                if ($auth->save()) {
                    $transaction->commit();
                    Yii::$app->user->login($user, Yii::$app->params['user.rememberMeDuration']);
                } else {
                    $transaction->rollBack();
                    Yii::$app->getSession()->setFlash('error',
                        Yii::t('app', 'Ошибка регистрации {client}: {errors}', [
                            'client' => $this->client->getTitle(),
                            'errors' => json_encode($auth->getErrors()),
                        ]),
                    );
                }
            } else {
                Yii::$app->getSession()->setFlash('error',
                    Yii::t('app', 'Ошибка регистрации: {errors}', [
                        'client' => $this->client->getTitle(),
                        'errors' => json_encode($user->getErrors()),
                    ]),
                );
            }
        }
    }

    /**
     * @param User $user
     */
    private function vkSettings($attributes)
    {
        $firstName = ArrayHelper::getValue($attributes, 'first_name');
        $lastName = ArrayHelper::getValue($attributes, 'last_name');
        $photo = ArrayHelper::getValue($attributes, 'photo');
        $password = Yii::$app->security->generateRandomString(6);

        $user = new User([
            'username' => "$firstName $lastName",
            'status' => User::STATUS_ACTIVE,
            'social_photo' => $photo,
            'password' => $password,
        ]);
        return $user;
    }
}