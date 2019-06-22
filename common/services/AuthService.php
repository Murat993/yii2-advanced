<?php


namespace common\services;


use yii\base\Component;

class AuthService extends Component
{
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    public function givePermissions($id_user, $type)
    {
        $authManager = \Yii::$app->authManager;
        $role = $authManager->getRole($type);
        return $authManager->assign($role, $id_user);
    }

    public function updatePermissions($id_user, $type)
    {
        $authManager = \Yii::$app->authManager;
        $role = $authManager->getRole($type);
        if ($authManager->revokeAll($id_user)) {
            return $authManager->assign($role, $id_user);
        }else{
            return false;
        }
    }
}