<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Task */
/* @var $modelComment \common\models\Comment*/

?>
<div class="modal__content-main">
    <div class="modal__header">
        <div class="modal__title">
            <?=$model->title ?>
        </div>
        <div class="modal__desc">
            <?=$model->description ?>
        </div>
    </div>
    <div class="modal__comments">
        <div class="comments__title">Коментарии</div>
        <ul class="comments__list">
            <?php foreach ($model->getComments()->all() as $comment): ?>
            <li class="comments__item">
                <div class="comments__header">
                    <div class="comments__name"><?= $comment->creator->username ?>
                        <span class="comments__date"><?= date('Y-m-d H:i', $comment->created_at) ?></span>
                    </div>
                </div>
                <div class="comments__message">
                    <?= $comment->comment ?>
                </div>
                <a href="#" class="comments__reply">Ответить</a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php $form = ActiveForm::begin([
            'id'=>'form-comment',
            'action'=>'/',
            'options' => [
                'class' => 'send-comment_task'
            ]
        ]); ?>
        <?= $form->field($modelComment, 'comment')->textInput(
            ['maxlength' => true, 'class' => 'form-control comment_input']) ?>
        <?= $form->field($modelComment , "task_id",[
            'template' => '{input}{error}'
        ])->hiddenInput(['value' => $model->id]); ?>
        <?= $form->field($modelComment , "project_id",[
            'template' => '{input}{error}'
        ])->hiddenInput(['value' => $model->taskCategory->project_id]); ?>
        <?= $form->field($modelComment , "task_category_id",[
            'template' => '{input}{error}'
        ])->hiddenInput(['value' => (int)$model->task_category_id]); ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="modal__footer">
    <div>
        <div class="modal__cost">Задачу создал: <?= $model->creator->username; ?></div>
        <?php if ($model->executor_id): ?>
            <div class="modal__cost">Задачу взял: <?= $model->executor->username; ?></div>
        <?php endif; ?>
    </div>
    <div class="modal__spinner">
    </div>
    <?php if (empty($model->completed_at)): ?>
        <?php if (empty($model->executor_id)): ?>
            <button class="button modal__add-cart give_task_to_user"
                    data-task_user="<?= Yii::$app->user->id ?>"
                    data-task_id="<?= $model->id ?>">Взять задачу
            </button>
        <?php else: ?>
            <button class="button modal__add-cart complete_task_to_user"
                    data-task_id="<?= $model->id ?>">Завершить задачу
            </button>
        <?php endif; ?>
    <?php endif; ?>
</div>