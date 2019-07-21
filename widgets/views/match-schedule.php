<?php

use yii\helpers\Url;
use yii\helpers\Html;

$i = 1;
$base = Yii::$app->request->baseUrl;

?>
<section class=matchSchedule>
    <div class=container>
        <div class=row>
            <div class="matchSchedule_details row">
                <div class=match_versus-wrap>
                    <div class=wrap_match-innerdetails>
                        <ul class="home_tInfo scrollable">
                            <?php foreach ($matches as $m):?>
                            <li><a href="#">
                                <ul class="t_info match_info01 headline01 clearfix">
                                    <li><?= $i++;?></li>
                                    <li>
                                        <div class="headline01 clearfix"><span><?= \app\components\DefaultComponent::name($m->homeTeams->name);?></span><span
                                                class=vs>vs</span> <span><?= \app\components\DefaultComponent::name($m->guestTeams->name);?></span></div>
                                        <div class="paragraph02 clearfix"><span><?= date('d-m-Y', $m->date);?></span>
                                            <span><?= date('H:m', $m->date);?></span></div>
                                    </li>
                                </ul>
                            </a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <div class=match_next>
                    <div class="wrap_match_next left_triangle">
                        <div class=left_padding>
                            <h4 class=headline03><?= Yii::t('app', 'Kelasi o\'yinlar');?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="matchSchedule_details row">
                <div class=match_next>
                    <div class="wrap_match_next right-triangle">
                        <div class=right-padding>
                            <h4 class=headline03><?= Yii::t('app', 'Turnirlar jadvali');?></h4>
                            <?//= Html::dropDownList();?>
                        </div>
                    </div>
                </div>
                <div class=match_versus-wrap>
                    <div class=wrap_match-innerdetails>
                        <ul class="point_table scrollable">
                            <li class=clearfix>
                                <div class=subPoint_table>
                                    <div class="headline01 smallpoint">1</div>
                                    <div class="headline01 largepoint">FC Qizilqum</div>
                                    <div class="headline01 smallpoint row row"><span>p</span><span>10</span></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>