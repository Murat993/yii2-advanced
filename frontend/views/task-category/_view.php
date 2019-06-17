<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $model \common\models\TaskCategory
 */

?>

<div class="col">
    <div class="card">
        <div class="card-header text-center">
            <h4><?= $model->name ?></h4>
        </div>
        <div class="card-block">
            <div class="input-group task-group">
                <input type="text" class="form-control input-task_category" placeholder="добавить задачу"/>
                <button href="#" class="btn btn-primary add-new-task" data-task_category="<?=$model->id?>">
                    <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                </button>
            </div>
            <ul class='list-group task-list-category'>
                <?php foreach ($model->getTasks()->asArray()->all() as $task): ?>
                <li class="list-group-item justify-content-between list-group-item-js" data-task_id_list="<?=$task['id']?>">
                    <?= $task['title'] ?>
                    <button class="btn btn-sm btn-danger remove-task_category"
                            data-task_id="<?=$task['id']?>">
                        <i aria-hidden="true" class="glyphicon glyphicon-trash"></i>
                    </button>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>


