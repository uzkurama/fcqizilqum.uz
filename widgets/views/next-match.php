<?php
foreach ($matches as $m) {
    $this->registerJs("
var myInterval;
var timeZone = 'Asia/Tashkent';

var clock = $('#clock'),
  eventTime = ".$m->date.",
  currentTime = moment(new Date().getTime()).unix(),
  diffTime = eventTime - currentTime,
  duration = moment.duration(diffTime * 1000, 'milliseconds'),
  interval = 1000;

// if time to countdown
if(diffTime > 0) {

// Show clock
// clock.show();

clearInterval(myInterval);
myInterval = setInterval(function(){
  
  duration = moment.duration(duration.asMilliseconds() - interval, 'milliseconds');
  var d = moment.duration(duration).days(),
      h = moment.duration(duration).hours(),
      m = moment.duration(duration).minutes(),
      s = moment.duration(duration).seconds();
  
  d = $.trim(d).length === 1 ? '0' + d : d;
  h = $.trim(h).length === 1 ? '0' + h : h;
  m = $.trim(m).length === 1 ? '0' + m : m;
  s = $.trim(s).length === 1 ? '0' + s : s;
  
  // show how many hours, minutes and seconds are left
  $('.days').text(d + '".' '.Yii::t('app', 'kun').' - '."');
  $('.hours').text(h + '".' '.Yii::t('app', 'soat').' - '."');
  $('.minutes').text(m + '".' '.Yii::t('app', 'daqiqa').' - '."');
  $('.seconds').text(s + '".' '.Yii::t('app', 'soniya')."');
  
}, interval);

}  
", yii\web\View::POS_END);
}
?>
<style>
    div .timer
    {
        margin-top: 1em;
        font-size: 2em;
        color: white;
        font-family: "Oswald", sans-serif;
        text-transform: uppercase;
    }
    .days, .hours, .minutes, .seconds
    {
        display: inline-block;
        padding: 0.5em;
    }
</style>
<section class=latestResult style="padding-bottom: 2em;">
    <div class=container>
        <div class=row>
            <h2 class=heading>Keyingi <span>o'yin</span></h2>
            <?php foreach ($matches as $m):?>
            <div class="timer center">
                <div id="clock"></div>
                <div class="days"></div><div class="hours"></div><div class="minutes"></div><div class="seconds"></div>
            </div>
            <div class="result clearfix">
                <div class=result-details>
                    <div class=content><h4><?= \app\components\DefaultComponent::name($m->homeTeams->name);?></h4></div>
                    <div class=figure>
                        <div class=team-logo>
                            <div style=background:url(<?= Yii::$app->request->baseUrl.$m->homeTeams->logo;?>) class=teamLogoImg></div>
                        </div>
                    </div>
                </div>
                <div class=result-count>
                    <div class=dateTime>
                        <div class=dateTime-container><span class=date><?= date('d-m-Y', $m->date);?></span> <span
                                class=time><?= date('H:i', $m->date);?></span></div>
                        <div class=country-wrap><span class=country><?= \app\components\DefaultComponent::name($m->region->name);?><br><span class=field><?= \app\components\DefaultComponent::name($m->stadion);?></span></span>
                        </div>
                    </div>
                </div>
                <div class=result-details>
                    <div class="content contentresult"><h4><?= \app\components\DefaultComponent::name($m->guestTeams->name);?></h4></div>
                    <div class="figure figresult">
                        <div class=team-logo>
                            <div style=background:url(<?= Yii::$app->request->baseUrl.$m->guestTeams->logo;?>) class=teamLogoImg></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>