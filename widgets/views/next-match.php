<section class=latestResult style="padding-bottom: 2em;">
    <div class=container>
        <div class=row>
            <h2 class=heading>Keyingi <span>o'yin</span></h2>
            <?php foreach ($matches as $m):?>
            <div class="result clearfix">
                <div class=result-details>
                    <div class=content><h4><?= $m->homeTeams->name;?></h4></div>
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
                        <div class=country-wrap><span class=country><?= $m->region->name;?><br><span class=field><?= $m->stadion;?></span></span>
                        </div>
                    </div>
                </div>
                <div class=result-details>
                    <div class="content contentresult"><h4><?= $m->guestTeams->name;?></h4></div>
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