<?php
namespace common\modules\chat\widgets;

use Yii;
use yii\web\View;

class Chat extends \yii\bootstrap\Widget
{
    public $port = 8181;
    public function init()
    {
        ChatAsset::register($this->view);
        $this->view->registerJs('let wsPort = '.$this->port, View::POS_BEGIN);
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('chat');
    }
}
