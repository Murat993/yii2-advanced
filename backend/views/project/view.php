<?php

use common\models\Project;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            [
                'label' => 'Астивный',
                'attribute' => 'active',
                'value' => function (Project $data) {
                    return Project::getStatusProject($data->active);
                }
            ],
            [
                'label' => 'Создатель',
                'attribute' => 'creator_id',
                'value' => function (Project $data) {
                    return Project::getProjectUser($data->creator_id);
                }
            ],
            [
                'label' => 'Обновитель',
                'attribute' => 'creator_id',
                'value' => function (Project $data) {
                    return Project::getProjectUser($data->creator_id);
                }
            ],
            [
                'label' => 'Дата создания',
                'attribute' => 'created_at',
                'value' => function (Project $data) {
                    return date('Y-m-d', $data->created_at);
                }
            ],
            [
                'label' => 'Дата обновления',
                'attribute' => 'updated_at',
                'value' => function (Project $data) {
                    return date('Y-m-d', $data->updated_at);
                }
            ],
        ],
    ]) ?>

</div>
