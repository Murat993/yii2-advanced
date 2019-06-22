<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?php $form = ActiveForm::begin([
    'id' => 'profile-user',
    'options' =>
        ['enctype' => 'multipart/form-data'],
]); ?>
<div class="tab-content" id="myTabContent">
    <div class="shop__title">Профиль</div>
    <ul class="order__input-list">
        <li class="order__input-item">
            <?= $form->field($model, 'username')->textInput(['class' => 'order__input', 'placeholder' => 'Логин']) ?>
        </li>
        <li class="order__input-item">
            <?= $form->field($model, 'email')->textInput(['class' => 'order__input', 'placeholder' => 'Емайл']) ?>
        </li>
        <li class="order__input-item">
            <?= $form->field($model, 'avatar')
                ->fileInput(['accept' => 'image/*'])
                ->label(Html::img($model->getThumbUploadUrl('avatar', User::AVATAR_PREVIEW)));
            ?>
        </li>
        </ul>
<div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>

