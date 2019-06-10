<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = 'Создать проект';
?>
<?php Pjax::begin([
    'id' => 'list-pjax',
    'scrollTo' => 0,
    'timeout' => 10000,
    'enablePushState' => false
]); ?>
<div class="project-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php Pjax::end(); ?>
