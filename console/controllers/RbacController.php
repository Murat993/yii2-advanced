<?php


namespace console\controllers;


use yii\console\Controller;
use Yii;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $createProject = $auth->createPermission('createProject');
        $createProject->description = 'Create a projects';
        $auth->add($createProject);

        $user = $auth->createRole('user');
        $auth->add($user);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($user, $createProject);
        $auth->addChild($admin, $createProject);

        $auth->assign($user, 2);
        $auth->assign($admin, 1);
    }
}