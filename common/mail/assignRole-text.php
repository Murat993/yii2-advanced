<?php
use yii\helpers\Html;

/**
 * @var $user \common\models\User
 * @var $this \yii\web\View
 * @var $project \common\models\Project
 * @var $role string
 */
?>
Привет <?= Html::encode($user->username) ?>

В проекте <?= $project->title ?> тебе назначена роль <?= $role ?>
