<?php


namespace common\services;


use Yii;

class NotificationService
{
    public function sendAboutNewProjectRole($user, $project, $role)
    {
        $views = ['html' => 'assignRole-html', 'text' => 'assignRole-text'];
        $data = ['user' => $user, 'project' => $project, 'role' => $role];
        Yii::$app->emailService->send($user->email,'Subject', $views, $data);
    }
}