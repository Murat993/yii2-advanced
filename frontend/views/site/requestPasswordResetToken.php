<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Восстановить пароль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login__wrapper">
    <div class="login__content">
        <div class="login__form">
            <h1 class="login__title">Восстановить пароль</h1>
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email']) ?>

            <?= Html::submitButton('Отправить', ['class' => 'button']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
