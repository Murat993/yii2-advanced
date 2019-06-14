<?php

namespace frontend\modules\api\controllers;

use frontend\modules\api\models\ProjectApi;
use yii\rest\ActiveController;

/**
 * Default controller for the `api` module
 */
class ProjectController extends ActiveController
{
    public $modelClass = ProjectApi::class;
}
