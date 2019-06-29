<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login__wrapper">
    <div class="login__content">
        <div class="login__form">
            <h1 class="login__title">Восстановить пароль</h1>
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

            <?= $form->field($model, 'password')
                ->passwordInput(['class' => 'order__input', 'placeholder' => 'Пароль']) ?>

            <?= Html::submitButton('Сохранить', ['class' => 'button']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
