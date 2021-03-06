<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\User;
use common\models\Project;
use unclead\multipleinput\MultipleInput;
use common\models\ProjectUser;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(
        [
            'layout' => 'horizontal',
            'fieldConfig' => [
                'horizontalCssClasses' => ['label' => 'col-sm-2',]
            ],
        ]
    ); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'active')->dropDownList(Project::STATUSES_LABELS) ?>

    <?= $form->field($model, Project::RELATION_PROJECT_PROJECT_USER)->widget(MultipleInput::class, [
        'id' => 'project-users-widget',
        'max' => 10,
        'min' => 0,
        'addButtonPosition' => MultipleInput::POS_HEADER,
        'columns' => [
            [
                'name'  => 'project_id',
                'type'  => 'hiddenInput',
                'defaultValue' => $model->id,
            ],
            [
                'name'  => 'user_id',
                'type'  => 'dropDownList',
                'title' => 'Юзер',
                'items' => User::find()->select('username')->indexBy('id')->column()
            ],
            [
                'name'  => 'role',
                'type'  => 'dropDownList',
                'title' => 'Роль',
                'items' => ProjectUser::ROLES_LABELS
            ],
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
