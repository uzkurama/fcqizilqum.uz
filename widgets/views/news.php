<?php

use yii\helpers\Url;
use yii\helpers\StringHelper;

?>

<section class="latest_news bg-white">
    <div class=container>
        <div class=row><h2 class="heading"><span><?= Yii::t('app', 'So\'nggi yangiliklar');?></span></h2>
            <div class="LatestNews_wrap clearfix">
                <ul class="nav accordion-news" role=tablist>
                    <li class=active>
                        <a href=#club_news aria-controls=club_news role=tab data-toggle=tab id=club_news_but><?= Yii::t('app', 'Klub yangiliklari');?></a>
                    </li>
                    <li>
                        <a href=#boshqarma_news aria-controls=boshqarma_news role=tab data-toggle=tab id=boshqarma_news_but><?= Yii::t('app', 'Boshqarma yangiliklari');?></a>
                    </li>
                </ul>
                <div class="tab-content news_display_container clearfix">
                    <ul id=club_news class="tab-pane active clearfix">
                        <?php foreach ($club as $c):?>
                        <li>
                            <div class=figure>
                                <div class=column-news>
                                    <div class=figure-01><img class="img-responsive" src="<?= Yii::$app->request->baseUrl.$c->pic;?>"></div>
                                    <div class=content-01><h6><a href="<?= Url::to(['news/view', 'id' => $c->id]);?>"><?= $c->title;?></a></h6>
                                        <p class=describtion><?= StringHelper::truncate($c->content, 100);?></p>
                                    </div>
                                    <div class="news_date clearfix"><span><?= date('d-m-Y' ,$c->date);?></span></div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
<!--                    <a class="prv club_prev"></a> <a class="nxt club_next"></a>-->
                    <ul id=boshqarma_news class="tab-pane">
                        <?php foreach ($boshqarma as $b):?>
                        <li>
                            <div class=figure>
                                <div class=column-news>
                                    <div class=figure-01><img class="img-responsive" src="<?= Yii::$app->request->baseUrl.$b->pic;?>"></div>
                                    <div class=content-01><h6><a href="<?= Url::to(['news/view', 'id' => $b->id]);?>"><?= $b->title;?></a></h6>
                                        <p class=describtion><?= StringHelper::truncate($b->content, 100);?></p>
                                    </div>
                                    <div class="news_date clearfix"><span><?= date('d-m-Y' ,$b->date);?></span></div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>