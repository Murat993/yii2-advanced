<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Resend verification email';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login__wrapper">
    <div class="login__content">
        <div class="login__form">
            <h1 class="login__title">Отправить письмо с подтверждением</h1>
            <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email']) ?>

            <?= Html::submitButton('Отправить', ['class' => 'button']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
