<?php


namespace frontend\modules\api\models;

use common\models\Task;
use yii\helpers\StringHelper;

class TaskApi extends Task
{
    public function fields()
    {
        return [
            'id',
            'title',
            'description_short' => function($model) {
               return StringHelper::truncate($this->description, 50);
            }
        ];
    }

    public function extraFields()
    {
        return ['project'];
    }
}