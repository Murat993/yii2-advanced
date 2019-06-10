<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\ListView;
?>
<header class="main__header">
    <h1 class="main__title">Список проектов</h1>
    <div class="main__sort">
    <?= Html::button(Yii::t('app', 'Создать проект'),
        ['class' => 'btn-create-project', 'id' => 'modalProjectButton',
            'value' => Url::to("project/create")]) ?>
    </div>
</header>

<?php Pjax::begin([
    'id' => 'list-pjax',
    'scrollTo' => 0,
    'timeout' => 10000,
    'enablePushState' => false
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


<div id="modal-project" class="fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div id='modalProjectContent'></div>
            </div>
        </div>
    </div>
</div>

