<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<header class="main__header">
    <h1 class="main__title">Список задач</h1>
    <div class="main__sort">
        <?= Html::button(Yii::t('app', 'Создать категорию'),
            ['class' => 'btn-create-task-category']) ?>
    </div>
</header>

<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
                <h4>Todos ({{todoList.length}})</h4>
            </div>
            <div class="card-block">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Add a Task"/>
                    <button href="#" class="btn btn-primary">
                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                    </button>
                </div>
                <ul class='list-group'>
                    <li class="list-group-item justify-content-between">
                        {{ todo.text }}
                        <button class="btn btn-sm btn-danger"><i aria-hidden="true" class="glyphicon glyphicon-trash"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

