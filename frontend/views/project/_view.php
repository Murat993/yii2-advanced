<?php

use common\models\Project;
use yii\helpers\Url;

/**
 * @var $model \common\models\Project
 */
?>
    <a href="<?= Url::to(['task-category/index', 'id' => $model->id]) ?>" class="shops-dishes__link shops-only__link">
        <div class="shops-only__img shops-only__img_close">
            <img src="/img/no-project.png" alt="">
            <!-- <div class="shops-only__img-overlay">Закрыто</div> -->
        </div>
        <div class="shops-only__wrap">
            <header class="shops-dishes__header shops-only__header">
                <div class="shops-dishes__name shops-only__name"><?= $model->title ?></div>
                <div class="shops-dishes__rating shops-only__rating">
                    <span><?= $model->creator->username ?></span>
    </span>
                </div>
            </header>
            <div class="shops-dishes__desc shops-only__desc">
                <div class="shops-dishes__status <?= $model->active === Project::STATUS_NOT_ACTIVE ? 'shops-dishes__status_close' : "shops-dishes__status_open" ?>"><?= Project::STATUSES_LABELS[$model->active]?></div>
                <ul class="tag__list">
                    <li class="tag__item"><?= $model->description ?></li>
                </ul>
            </div>
            <div class="shops-dishes__info-wrap">
                <div class="shops-dishes__info">Дата создания: <?= date('Y-m-d', $model->created_at) ?></div>
                <div class="shops-dishes__info">Дата обновления: <?= date('Y-m-d', $model->created_at) ?></div>
            </div>
        </div>
    </a>
