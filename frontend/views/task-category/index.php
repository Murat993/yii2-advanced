<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;
?>
<header class="main__header">
    <h1 class="main__title">Список задач</h1>
    <?php
    if (\Yii::$app->user->can('client-superuser-permissions', ['project' => $project])) {
       echo Html::a(Yii::t('app', 'Редактировать проект'),
            ['project/update', 'id' => $project->id],
            ['class' => 'button',
            ]);
    }
    ?>
    <div class="main__sort">
        <?= Html::button(Yii::t('app', 'Создать категорию'),
            ['class' => 'btn-create-task-category',
             'id' => 'modalTaskCategoryButton',
             'data-project_id' => Yii::$app->request->get('id'),
            ]) ?>
    </div>
</header>
<?php Pjax::begin([
    'id' => 'task-category-pjax',
    'scrollTo' => 0,
    'timeout' => 10000,
]); ?>
<div class="shops-dishes shops-only">
    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
        'itemOptions' => [
            'class' => 'shops-dishes__item shops-only__item',
            'tag' => 'li'
        ],
        'layout'=>'
                <ul class="shops-dishes__list">
                    {items}
                </ul>
            ',
        'summary' => Yii::t('app', 'Сборочных пунктов {count} из {totalCount}'),
    ])
    ?>
</div>
<?php Pjax::end(); ?>


<div id="modal-task-category" class="fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div id='modalTaskCategoryContent'></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="menuModal" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog-modal modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="modal__content"></div>
        </div>
    </div>
</div>


