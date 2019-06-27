<?php


namespace console\controllers;


use common\rbac\ClientOwnProjectRule;
use yii\console\Controller;
use Yii;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $clientOwnRule = new ClientOwnProjectRule();
        $auth->add($clientOwnRule);

        ///////////////////////////////////////////////////////////
        //Global Permissions
        $adPerm = $auth->createPermission('admin-permissions');
        $auth->add($adPerm);
        $clientUserPerm = $auth->createPermission('client-user-permissions');
        $auth->add($clientUserPerm);
        $clientSuperPerm = $auth->createPermission('client-superuser-permissions');
        $auth->add($clientSuperPerm);
        ///////////////////////////////////////////////////////////
        //Update own project Permissions
        $updateOwnProject = $auth->createPermission('updateOwnProject');
        $updateOwnProject->ruleName = $clientOwnRule->name;
        $auth->add($updateOwnProject);
        $auth->addChild($updateOwnProject, $clientSuperPerm);
        ///////////////////////////////////////////////////////////
        //Client Hierarchy
        $clientUser = $auth->createRole('client-user');
        $auth->add($clientUser);
        $auth->addChild($clientUser, $clientUserPerm);
        $clientSuper = $auth->createRole('client-super');
        $auth->add($clientSuper);
        $auth->addChild($clientSuper, $clientSuperPerm);
        $auth->addChild($clientSuper, $clientUser);
        ///////////////////////////////////////////////////////////
        //Update own project Permissions
        $auth->addChild($clientUser, $updateOwnProject);
        ///////////////////////////////////////////////////////////
        //Admin all permissions
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $adPerm);
        $auth->addChild($admin, $clientUser);
        $auth->addChild($admin, $clientSuper);
    }
}