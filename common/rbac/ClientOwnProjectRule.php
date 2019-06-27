<?php


namespace common\rbac;


use yii\rbac\Rule;

class ClientOwnProjectRule extends Rule
{
    public $name = 'isOwnProjectClient';

    public function execute($user, $item, $params)
    {
        return isset($params['project']) ? $params['project']->creator_id == $user : false;
    }
}