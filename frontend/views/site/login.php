<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\authclient\widgets\AuthChoice;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Auth;

$this->title = 'Авторизация';
?>
<div class="login__wrapper">
    <div class="login__img"></div>
    <div class="login__content">
        <div class="login__logo">
            <img src="/img/group-logo.svg" class="logo-group"  alt="login__form">
        </div>
        <div class="login__form">
            <h1 class="login__title">Авторизация</h1>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username')
                ->textInput(['class' => 'order__input', 'placeholder' => 'Логин']) ?>

            <?= $form->field($model, 'password')
                ->passwordInput(['class' => 'order__input']) ?>

            <?= Html::submitButton('Войти', ['class' => 'button', 'name' => 'login-button']) ?>

            <?php ActiveForm::end(); ?>
                <?php $authAuthChoice = AuthChoice::begin([
                    'baseAuthUrl' => ['site/auth'],
                    'popupMode' => true,

                ]) ?>
                <ul class="comments__soc-list">
                    <?php foreach ($authAuthChoice->getClients() as $client): ?>
                        <li class="comments__soc-item">
                            <?= $authAuthChoice->clientLink($client,
                                Auth::SOCIAL_LABELS[$client->getName()],
                                ['class' => 'comments__soc-link']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php AuthChoice::end(); ?>
        </div>
        <?= Html::a('Забыли пароль?', ['site/request-password-reset'], ['class' =>'login__forget']) ?>
        <?= Html::a('Регистрация', ['site/signup'], ['class' =>'login__forget']) ?>
    </div>
</div>
