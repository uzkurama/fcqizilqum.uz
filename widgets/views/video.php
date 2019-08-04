<?php

use yii\widgets\Pjax;

?>


<section class=latestvideo>
    <div class=container>
        <div class=row>
            <h2 class=heading>
                <span><?= Yii::t('app', 'Videolar');?></span>
            </h2>
            <div class="video-wrap clearfix">
                <div class="video-content clearfix"><a class=btn-up></a>
                    <ul class="videoLive clearfix" id=videoSlide role=tablist>
                        <?php foreach ($videos as $v):?>
                        <li>
                            <a class="changeVideo" data-yt-video="<?= $v->url?>">
                                <div>
                                    <span><?= \app\components\DefaultComponent::name($v->title);?></span><br>
                                    <span><i class="fas fa-clock"></i> <?= date('d-m-Y', $v->date);?></span>
                                </div>
                            </a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <a class=btn-down></a>
                </div>
                <div class=video-show>
                    <?php foreach ($videos as $index => $v):?>
                    <?php if($index > 0) break;?>
                    <?php Pjax::begin(['enablePushState' => false]);?>
                    <div class="video-container" id="video01" data-current-video="<?= $v->url;?>">
                        <iframe width="100%" height="100%" src="<?= $v->url;?>" class=liveVideo allowfullscreen=""></iframe>
                    </div>
                    <?php Pjax::end();?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>