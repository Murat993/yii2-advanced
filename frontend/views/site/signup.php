<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="login__wrapper">
    <div class="login__content">
        <div class="login__form">
            <h1 class="login__title">Регистрация</h1>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')
                ->textInput(['class' => 'order__input', 'placeholder' => 'Логин']) ?>

            <?= $form->field($model, 'email')
                ->textInput(['class' => 'order__input', 'placeholder' => 'Email']) ?>

            <?= $form->field($model, 'password')
                ->passwordInput(['class' => 'order__input', 'placeholder' => 'Пароль']) ?>

            <?= Html::submitButton('Зарегестироваться', ['class' => 'button', 'name' => 'signup-button']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
