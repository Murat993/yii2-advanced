<?php

use common\models\Project;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Редактирование проекта';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
?>

<?php $form = ActiveForm::begin([
    'id' => 'form-project']); ?>
<div class="tab-content" id="myTabContent">
    <div class="shop__title">Редактирование проекта</div>
    <ul class="order__input-list">
        <li class="order__input-item">
            <?= $form->field($model, 'title')->textInput(['class' => 'order__input', 'placeholder' => 'Логин']) ?>
        </li>
        <li class="order__input-item">
            <?= $form->field($model, 'description')->textInput(['class' => 'order__input', 'placeholder' => 'Емайл']) ?>
        </li>
        <li class="order__input-item">
            <?= $form->field($model, 'active')->dropDownList(Project::STATUSES_LABELS) ?>
        </li>
    </ul>
    <div>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>

