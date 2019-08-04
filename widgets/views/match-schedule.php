<?php

use kartik\select2\Select2;
use yii\helpers\Html;


$i = 1;
$base = Yii::$app->request->baseUrl;

$last_options = \app\models\MatchesOptions::find()->where(['match_id' => $last->id])->one();
?>

<div class="matchSchedule_details row">
    <div class="match_next right-triangle">
        <div class="wrap_match_next right-triangle">
            <div class=right-padding><h4 class=headline03><?= Yii::t('app', 'So\'nggi o\'yin');?></h4>
                <?= Html::a(Yii::t('app', 'Batafsil'), ['matches/view', 'id' => $last->id], ['class' => 'btn btn-white']);?>
            </div>
        </div>
    </div>
    <div class=match_versus>
        <div class="bg-blackimg match_versus02">
            <div class=nextmatchDetails>
                <div class="wrap-logo clearfix">
                    <div class=logo-match>
                        <h4 class="last-text"><?= \app\components\DefaultComponent::name($last->homeTeams->name);?></h4>
                        <img class="last-logo" src="<?= $last->homeTeams->logo;?>" alt="">
                    </div>
                    <div class=match_vs>vs</div>
                    <div class=logo-match><h4 class="last-text"><?= \app\components\DefaultComponent::name($last->guestTeams->name);?></h4><img class="last-logo" src="<?= $last->guestTeams->logo;?>" alt=""></div>
                </div>
                <p class=match_dtls><?= date('d-m-Y H:i', $last->date);?></p>

                <p class=match_dtls><?= \app\components\DefaultComponent::name($last->region->name);?> | <?= \app\components\DefaultComponent::name($last->stadion);?></p>
                <div class="row last-goals">
                    <div class="col-xs-6 text-center">
                        <ul class=match_dtls>
                            <?php foreach ($last_options->home_goals as $z => $home_goal){
                                $z=0; $z++;
                                if($i < 5) {
                                    echo Html::tag('li', $home_goal['time'] . '` - ' . $home_goal['player']);
                                }
                            }?>
                        </ul>
                    </div>
                    <div class="col-xs-6 text-center">
                        <ul class=match_dtls>
                            <?php foreach ($last_options->guest_goals as $i => $guest_goal){
                                $i=0; $i++;
                                if($i < 5) {
                                    echo Html::tag('li', $guest_goal['time'] . '` - ' . $guest_goal['player']);
                                }
                            }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                            <div class="paragraph02 clearfix">
                                <span><?= \app\components\DefaultComponent::name($m->region->name);?></span>
                                <span><?= \app\components\DefaultComponent::name($m->stadion);?></span>
                                <span><?= date('d-m-Y', $m->date);?></span>
                                <span><?= date('H:i', $m->date);?></span>
                            </div>
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
