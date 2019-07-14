<?php

use yii\helpers\Html;
use yii\helpers\Url;

$current_lang = app\models\Language::find()->where(['language_code_id' => app\models\Country::find()->where(['language_code' => Yii::$app->language])->select('id')->one()])->select('name')->one();
$current_lang_code = app\models\Country::find()->where(['language_code' => Yii::$app->language])->select('language_code')->one();
?>
<style type="text/css">.caret{display:none;}</style>
<header class=header-main>
    <div class="header-lower clearfix">
        <div class=container-fluid style="padding: 0.5em 2em;">
            <div class=row><h1 class=logo><a href="<?= Yii::$app->homeUrl;?>"><img src=<?= Yii::$app->request->baseUrl.'/images/logo.png';?> alt=image></a></h1>

                <div class=menubar>
                    <nav class=navbar>
                        <div class=nav-wrapper>
                            <div class=navbar-header>
                                <button type=button class=navbar-toggle><span class=sr-only>Toggle navigation</span>
                                    <span class=icon-bar></span></button>
                            </div>
                            <div class=nav-menu>
                                <?php $lang_array = [];
                                foreach($all as $one):
                                        $lang = ['label' => Html::img(Yii::$app->request->baseUrl.'/images/flags/'.$one->languageCode->language_code.'.gif', ['class' => 'flag']).$one->name, 'url' => ['site/language', 'ln' => $one->languageCode->language_code]];
                                        array_push($lang_array, $lang);
                                endforeach?>
                                <?php echo yii\bootstrap\Nav::widget([
                                    'options' => ['class' => 'nav navbar-nav menu-bar'],
                                    'encodeLabels' => false,
                                    'items' => [
                                        ['label' => '<span></span><span></span><span></span><span></span>'.Yii::t('app', 'Klub'), 'url' => ['/site/index']],
                                        ['label' => '<span></span><span></span><span></span><span></span>'.Yii::t('app', 'Jamoa'), 'url' => ['/site/about']],
                                        ['label' => '<span></span><span></span><span></span><span></span>'.Yii::t('app', 'Yangiliklar'), 'url' => ['/site/contact']],
                                        [
                                            'label' => '<span></span><span></span><span></span><span></span>'.Html::img(Yii::$app->request->baseUrl.'/images/flags/'.$current_lang_code->language_code.'.gif', ['class' => 'flag']).$current_lang->name,
                                            'items' => $lang_array,
                                            'encodeLabels' => false,
                                            'submenuOptions' => ['class' => 'sub-menu'],
                                        ],
                                    ],
                                ]);?>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class=social>
                    <?php foreach ($contacts as $c):?>
                        <a href="<?= $c->facebook;?>" class="facebook"><i class="fab fa-facebook"></i></a>
                        <a href="<?= $c->twitter;?>" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="<?= $c->instagram;?>" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="<?= $c->youtube;?>" class="youtube"><i class="fab fa-youtube"></i></a>
                        <a href="<?= $c->telegram;?>" class="telegram"><i class="fab fa-telegram"></i></a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</header>