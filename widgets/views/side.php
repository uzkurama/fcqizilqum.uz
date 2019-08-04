<?php

use yii\helpers\Url;
use yii\helpers\StringHelper;

$base = Yii::$app->request->baseUrl;
?>



<aside class="widgetinner clearfix">
    <div class=row>
        <div class=blog_widget><h4><?= Yii::t('app', 'Boshqarma yangiliklar');?></h4>
            <ul class=widget_commentDetails>
                <?php foreach ($club as $c):?>
                <li>
                    <a href="<?= Url::to(['news/view', 'id' => $c->id]);?>" class=clearfix>
                        <a href="<?= $base.$c->pic;?>" class="progressive replace">
                          <img src="<?= $base.$c->pic;?>" class="preview" alt="" />
                        </a>
                        <div class="commentinfo">
                            <h5><?= $c->title;?></h5>

                            <p><?= StringHelper::truncate($c->content, 100);?></p>
                        </div>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class=blog_widget><h4><?= Yii::t('app', 'Klub yangiliklari yangiliklar');?></h4>
            <ul class=widget_commentDetails>
                <?php foreach ($boshqarma as $b):?>
                <li>
                    <a href="<?= Url::to(['news/view', 'id' => $b->id]);?>" class=clearfix>
                        <a href="<?= $base.$b->pic;?>" class="progressive replace">
                          <img src="<?= $base.$b->pic;?>" class="preview" alt="" />
                        </a>
                        <div class="commentinfo">
                            <h5><?= $b->title;?></h5>

                            <p><?= StringHelper::truncate($b->content, 100);?></p>
                        </div>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class=blog_widget><h4 class=oswald16>tag cloud</h4>
            <ul class="cloud_tag clearfix">
                <li><a href=#>sports</a></li>
                <li><a href=#>creative</a></li>
                <li><a href=#>experience</a></li>
                <li><a href=#>development</a></li>
            </ul>
        </div>
        <div class=blog_widget><h4 class=oswald16>subscribe</h4>

            <p class="red italic01">follow my latest news</p>

            <div class=mail_input>

            </div>
        </div>
    </div>
</aside>