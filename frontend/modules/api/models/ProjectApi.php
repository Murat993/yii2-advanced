<?php

namespace frontend\modules\api\models;

use common\models\Project;
use yii\helpers\StringHelper;

class ProjectApi extends Project
{
    public function fields()
    {
        return [
            'id',
            'title',
            'description_short' => function($model) {
                return StringHelper::truncate($this->description, 50);
            },
            'active',
        ];
    }

    public function extraFields()
    {
        return ['tasks'];
    }
}