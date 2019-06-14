<?php


namespace frontend\assets;


use yii\web\AssetBundle;

class BootstrapJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap/dist';
    public $js = [
        'js/bootstrap.js',
    ];
}