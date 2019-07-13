<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\FontAwesomeAsset;

AppAsset::register($this);
FontAwesomeAsset::register($this);
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

<div class=wrapper>
    <header class=header-main>
        <div class="header-lower clearfix">
            <div class=container>
                <div class=row><h1 class=logo><a href=index-2.html><img src=<?= Yii::$app->request->baseUrl.'/images/logo.png';?> alt=image></a></h1>

                    <div class=menubar>
                        <nav class=navbar>
                            <div class=nav-wrapper>
                                <div class=navbar-header>
                                    <button type=button class=navbar-toggle><span class=sr-only>Toggle navigation</span>
                                        <span class=icon-bar></span></button>
                                </div>
                                <div class=nav-menu>
                                    <?php echo yii\bootstrap\Nav::widget([
                                        'options' => ['class' => 'nav navbar-nav menu-bar'],
                                        'encodeLabels' => false,
                                        'items' => [
                                            ['label' => '<span></span><span></span><span></span><span></span>'.Yii::t('app', 'Klub'), 'url' => ['/site/index']],
                                            ['label' => '<span></span><span></span><span></span><span></span>'.Yii::t('app', 'Jamoa'), 'url' => ['/site/about']],
                                            ['label' => '<span></span><span></span><span></span><span></span>'.Yii::t('app', 'Yangiliklar'), 'url' => ['/site/contact']],
                                        ],
                                    ]);?>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class=social><a href=https://www.facebook.com/templatespoint.net class=facebook><i
                            class="fab fa-facebook"></i></a> <a href=https://twitter.com/itobuztech class=twitter><i
                            class="fab fa-twitter"></i></a> <a href=https://www.behance.net/ class=behance><i
                            class="fab fa-behance"></i></a></div>
                </div>
            </div>
        </div>
    </header>
    <section style="margin: 100px 0;">
        <div class="container">
            <?= $content;?>
        </div>
    </section>
    <footer class=footer-type01>
        <div class=container>
            <div class=row>
                <ul class=footer-widget>
                    <li class=widget-about><h4 class=footerheading>about <span>soccer club</span></h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae, velit perferendis
                            dolor atque magni, porro minus repellendus nostrum alias ea deserunt. Vel quam explicabo
                            laudantium accusamus est, nulla minima!</p>

                        <p><span class=uppercaseheading>address:</span><span class=red>239</span> main street
                            London,England.</p>

                        <p><span class=uppercaseheading>call:</span> <span class=red>1800-2222-3333</span></p></li>
                    <li class=widget-news><h4 class=footerheading>recent <span>news</span></h4>
                        <ul class="widget-newsdetails clearfix">
                            <li class=clearfix><a href="#" class=clearfix>
                                <div class=widget-pic
                                     style="background:url(<?= Yii::$app->request->baseUrl.'/images/widget/widget01.jpg';?>') center no-repeat"></div>
                                <div class=widget-newsinfo><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Numquam soluta excepturi.</p>

                                    <p class=uppercaseheading>18 september ,<span class=red>2015</span></p></div>
                            </a></li>
                            <li class=clearfix><a href="#" class=clearfix>
                                <div class=widget-pic
                                     style="background:url(<?= Yii::$app->request->baseUrl.'/images/widget/widget02.jpg';?>) center no-repeat"></div>
                                <div class=widget-newsinfo><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Numquam soluta excepturi.</p>

                                    <p class=uppercaseheading>18 september ,<span class=red>2015</span></p></div>
                            </a></li>
                            <li class=clearfix><a href="#" class=clearfix>
                                <div class=widget-pic
                                     style="background:url(<?= Yii::$app->request->baseUrl.'/images/widget/widget03.jpg';?>) center no-repeat"></div>
                                <div class=widget-newsinfo><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Numquam soluta excepturi.</p>

                                    <p class=uppercaseheading>18 september ,<span class=red>2015</span></p></div>
                            </a></li>
                        </ul>
                    </li>
                    <li class=widget-product><h4 class=footerheading>real <span>soccer products</span></h4>
                        <ul class=widget_productdetails>
                            <li><a href=#>shoes(4)</a></li>
                            <li><a href=#>men(4)</a></li>
                            <li><a href=#>t-shirt(4)</a></li>
                            <li><a href=#>sports(4)</a></li>
                            <li><a href="#">glass</a></li>
                        </ul>
                    </li>
                    <li class=widget-comment><h4 class=footerheading>recent <span>comments</span></h4>
                        <ul class=widget_commentDetails>
                            <li><a href=# class=clearfix>
                                <div class=comment-pic>
                                    <div class=columnpic><img src=<?= Yii::$app->request->baseUrl.'/images/widget/comment01.jpg';?> alt=image></div>
                                </div>
                                <div class=commentinfo><p class=uppercaseheading>jhon doe</p>

                                    <p>18 April ,<span class=red>2015</span></p>

                                    <p>nice and cool</p></div>
                            </a></li>
                            <li><a href=# class=clearfix>
                                <div class=comment-pic>
                                    <div class=columnpic><img src=<?= Yii::$app->request->baseUrl.'/images/widget/comment02.jpg';?> alt=image></div>
                                </div>
                                <div class=commentinfo><p class=uppercaseheading>jhon doe</p>

                                    <p>18 April ,<span class=red>2015</span></p>

                                    <p>nice and cool</p></div>
                            </a></li>
                            <li><a href=# class=clearfix>
                                <div class=comment-pic>
                                    <div class=columnpic><img src=<?= Yii::$app->request->baseUrl.'/images/widget/comment03.jpg';?> alt=image></div>
                                </div>
                                <div class=commentinfo><p class=uppercaseheading>jhon doe</p>

                                    <p>18 April ,<span class=red>2015</span></p>

                                    <p>nice and cool</p></div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class=footer-type02>
            <div class=container>
                <div class=row><a href=index-2.html class=footer-logo><img src=<?= Yii::$app->request->baseUrl.'/images/logo.png';?> alt=image></a>

                    <div class=footer-container>
                        <ul class=clearfix>
                            <li><a href=https://www.facebook.com/templatespoint.net class=bigsocial-link><i
                                    class="fab fa-facebook"></i></a></li>
                            <li><a href=https://twitter.com/ class=bigsocial-link target=_blank><i
                                    class="fab fa-twitter"></i></a></li>
                            <li><a href=https://www.behance.net/ class=bigsocial-link target=_blank><i
                                    class="fab fa-behance"></i></a></li>
                        </ul>
                        <p><a target="_blank" href="https://www.templatespoint.net/">Templates Point</a></p></div>
                    <div class=footer-appstore>
                        <figure><a href=#><img src=<?= Yii::$app->request->baseUrl.'/images/appstore/apple.png';?> alt=image></a></figure>
                        <figure><a href=#><img src=<?= Yii::$app->request->baseUrl.'/images/appstore/google.png';?> alt=image></a></figure>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
