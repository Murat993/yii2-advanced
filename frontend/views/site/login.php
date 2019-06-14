<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

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
                ->textInput(['class' => 'order__input', 'placeholder' => 'E-mail или номер телефона']) ?>

            <?= $form->field($model, 'password')
                ->passwordInput(['class' => 'order__input']) ?>

            <?= Html::submitButton('Войти', ['class' => 'button', 'name' => 'login-button']) ?>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="login__forget">Забыли пароль?</div>
    </div>
</div>
