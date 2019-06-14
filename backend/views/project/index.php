<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Project;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
