<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TaskCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-category-form">

    <?php $form = ActiveForm::begin([
        'id'=>'form-task-category',
        'options' => [
            'class' => 'ajax-form',
            'data-pjax_name_id' => 'task-category-pjax',
            'data-modal_id' => 'modal-task-category',
        ],
    ]); ?>

    <?= $form->field($model, 'project_id', [
        'template' => '{input}{error}'
        ])
        ->hiddenInput(['value' => $id_project]) ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
