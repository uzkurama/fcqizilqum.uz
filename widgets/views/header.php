<?php

use yii\bootstrap\Nav;
use yii\helpers\Url;
use yii\helpers\Html;

?>

<header class=header-main>
    <div class="header-lower clearfix">
        <div class=container-fluid style="margin: 0 20px;">
            <div class=row><h1 class=logo><a href=<?= Yii::$app->homeUrl;?>><img src=<?= Yii::$app->request->baseUrl.'images/logo_main.png';?> alt=image></a></h1>
                <div class=menubar>
                    <nav class=navbar>
                        <div class=nav-wrapper>
                            <div class=navbar-header>
                                <button type=button class=navbar-toggle><span class=sr-only>Toggle navigation</span>
                                    <span class=icon-bar></span></button>
                            </div>
                            <div class=nav-menu>
                                <?php echo Nav::widget([
                                    'options' => ['class' => 'nav navbar-nav menu-bar'],
                                    'encodeLabels' => false,
                                    'items' => [
                                        ['label' => Yii::t('app', 'Klubning tarixi').'<span></span> <span></span> <span></span> <span></span>', 'url' => ['/site/index']],
                                        ['label' => Yii::t('app', 'Jamoa').'<span></span> <span></span> <span></span> <span></span>', 'url' => ['/site/about']],
                                        ['label' => Yii::t('app', 'Futbolistlar').'<span></span> <span></span> <span></span> <span></span>', 'url' => ['/site/contact']],
                                        ['label' => Yii::t('app', 'Yangiliklar').'<span></span> <span></span> <span></span> <span></span>', 'url' => ['/site/contact']],
                                        ['label' => Yii::t('app', 'Media').'<span></span> <span></span> <span></span> <span></span>', 'url' => ['/site/contact']],
                                        ['label' => Yii::t('app', 'Aloqa').'<span></span> <span></span> <span></span> <span></span>', 'url' => ['/site/contact']],
                                        ['label' => Yii::t('app', 'Fan-Shop').'<span></span> <span></span> <span></span> <span></span>', 'url' => ['/site/contact']],
                                    ],
                                ]); ?>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class=social>
                    <?php foreach($contact as $c):?>
                        <a href=<?= $c->facebook;?> class=facebook><i class="fab fa-facebook"></i></a>
                        <a href=<?= $c->youtube;?> class=youtube><i class="fab fa-youtube"></i></a>
                        <a href=<?= $c->telegram;?> class=telegram><i class="fab fa-telegram"></i></a>
                        <a href=<?= $c->instagram;?> class=instagram><i class="fab fa-instagram"></i></a>
                        <a href=<?= $c->mover;?> class=mover><i class="fas fa-play-circle"></i></a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</header>