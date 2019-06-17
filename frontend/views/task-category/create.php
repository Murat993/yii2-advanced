<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TaskCategory */

$this->title = 'Создать Категорию';
$this->params['breadcrumbs'][] = ['label' => 'Список задач', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id_project' => $id_project,
    ]) ?>

</div>
