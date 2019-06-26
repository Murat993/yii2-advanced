<?php


namespace common\services;


use common\models\User;
use yii\base\Component;

class ImageService extends Component
{
    public function getUserAvatar()
    {
        $photo = '/img/no-photo.jpg';
        $currentUser = \Yii::$app->getUser()->identity;

        if ($currentUser->avatar) {
            $photo = $currentUser->getThumbUploadUrl('avatar', User::AVATAR_PREVIEW);
        } else if ($currentUser->social_photo) {
            $photo = $currentUser->social_photo;
        };

        return $photo;
    }
}