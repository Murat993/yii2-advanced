<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper">
    <header class="header">
        <button class="header__menu-button">

        </button>
         <a href="/" class="header__logo">
            <img src="/img/group-logo.svg" alt="">
        </a>
        <div class="header__search">
            <form action="">
                <input type="text" class="search__input" placeholder="Поиск...">
                <button class="search__button">
                    <svg class="search__icon" width="18" height="18" viewbox="0 0 18 18"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.7796 16.7216L13.4522 12.3943C14.5249 11.0865 15.1714 9.41143 15.1714 7.58571C15.1714 3.39796 11.7735 0 7.58571 0C3.39429 0 0 3.39796 0 7.58571C0 11.7735 3.39429 15.1714 7.58571 15.1714C9.41143 15.1714 11.0829 14.5286 12.3906 13.4559L16.718 17.7796C17.0118 18.0735 17.4857 18.0735 17.7796 17.7796C18.0735 17.4894 18.0735 17.0118 17.7796 16.7216ZM7.58571 13.6616C4.23184 13.6616 1.50612 10.9359 1.50612 7.58571C1.50612 4.23551 4.23184 1.50612 7.58571 1.50612C10.9359 1.50612 13.6653 4.23551 13.6653 7.58571C13.6653 10.9359 10.9359 13.6616 7.58571 13.6616Z"></path>
                    </svg>

                </button>
            </form>
        </div>
        <div class="header-user-login dropdown" >
            <a href="#" id="js-user-main-menu-link" class="">
                <div class="user-avatar"><img class="user-avatar-img" src="<?= Yii::$app->imageService->getUserAvatar()  ?>" alt=""></div>
                <div class="user-name"><?=Yii::$app->user->identity->username?></div>
            </a>
            <ul class="dropdown-menu user-menu" aria-labelledby="dropdownMenuButton" style="display: none;">
                <li class="logout"><a href="<?= \yii\helpers\Url::to(['site/logout']) ?>">Выйти</a></li>
            </ul>
        </div>
        <a href="#" class="header__profile">
            <svg class="profile__icon" width="22" height="22" viewbox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 0C4.93509 0 0 4.93423 0 11C0 14.8666 2.00999 18.2672 5.03478 20.2286C5.12424 20.3197 5.23673 20.3828 5.35941 20.4263C7.01155 21.418 8.93634 22 11 22C17.0658 22 22 17.0658 22 11C22 4.93423 17.0658 0 11 0ZM11 20.2968C9.38536 20.2959 7.8653 19.881 6.54036 19.1533C6.77806 17.0138 8.56144 15.4997 10.9829 15.4997C13.4121 15.4997 15.198 17.0232 15.4272 19.1729C14.11 19.8895 12.6019 20.2968 11 20.2968ZM8.38419 10.6847C8.38419 9.24219 9.55745 8.06893 11 8.06893C12.4425 8.06893 13.6158 9.24219 13.6158 10.6847C13.6158 12.1272 12.4425 13.3005 11 13.3005C9.55745 13.3005 8.38419 12.1273 8.38419 10.6847ZM16.9746 18.1112C16.5 16.3271 15.2049 14.9194 13.4445 14.2404C14.5752 13.4607 15.3199 12.1588 15.3199 10.6847C15.3199 8.30238 13.3823 6.36483 11 6.36483C8.61764 6.36483 6.68009 8.30238 6.68009 10.6847C6.68009 12.1545 7.42053 13.4514 8.54524 14.2327C6.78064 14.905 5.47955 16.3066 4.99813 18.0874C2.98646 16.3799 1.7041 13.8382 1.7041 11C1.7041 5.8749 5.87404 1.7041 11 1.7041C16.126 1.7041 20.2959 5.8749 20.2959 11C20.2959 13.8518 19.0025 16.4046 16.9746 18.1112Z"></path>
            </svg>
        </a>
    </header>
    <div class="content__wrapper">
        <aside class="aside">
            <div class="aside__wrap">
                <div class="aside__categories">
                    <form action="">
                        <ul class="categories__list">
                            <li class="categories__item">
                                <a class="categories__item_link" href="<?= \yii\helpers\Url::to('/') ?>">Проекты</a>
                            </li>
                            <li class="categories__item">
                                <a class="categories__item_link" href="<?= \yii\helpers\Url::to(['user/update', 'id' => Yii::$app->user->getId()]) ?>">Профиль</a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </aside>
        <main class="main">
            <?= $content ?>
        </main>
    </div>
</div>
<footer class="footer__wrapper">
    <header class="footer__header">
        <img src="/img/group-logo.svg" alt="logo">
        <div class="copyright__text">Copyright © <?= date('Y') ?> Project</div>
    </header>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
