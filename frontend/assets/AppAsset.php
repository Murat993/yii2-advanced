<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/project.css',
        'css/task.css',
        'css/loader.css',
    ];
    public $js = [
        'js/script.js',
        'js/pjax.js',
        'js/project.js',
        'js/task.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'frontend\assets\BootstrapJsAsset',
    ];
    public $jsOptions = [
        'position' => View::POS_END
    ];
}
