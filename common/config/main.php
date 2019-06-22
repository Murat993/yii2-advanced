<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'ru',
    'defaultRoute' => 'project',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'assetManager' => [
            'linkAssets' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'notificationService' => [
            'class' => \common\services\NotificationService::class,
        ],
        'emailService' => [
            'class' => \common\services\EmailService::class,
        ],
        'projectService' => [
            'class' => \common\services\ProjectService::class,
            'on .' . \common\services\ProjectService::EVENT_ASSIGN_ROLE => function(\common\services\AssignRoleEvent $e) {
                 Yii::$app->notificationService->sendAboutNewProjectRole($e->user, $e->project, $e->role);
            }
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'vkontakte' => [
                    'class' => 'yii\authclient\clients\VKontakte',
                    'clientId' => '6847586',
                    'clientSecret' => 'VjPWPQhrJVsDyM614Jfk',
                ],
            ],
        ]
    ],
    'modules' => [
        'chat' => [
            'class' => 'common\modules\chat\Module',
        ],
    ],
];
