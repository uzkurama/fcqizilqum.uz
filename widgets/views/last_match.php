<section class=latestResult>
    <div class=container>
        <div class=row><h2 class=heading><?= Yii::t('app', 'So\'nggi');?> <span><?= Yii::t('app', 'o\'yin');?></span></h2>
            <div class="result clearfix">
                <?php foreach($details as $d):?>
                <div class=result-details>
                    <div class=content><h4>fc Dragons</h4>

                        <p>lose</p>

                        <p>Shannon Skelly(23)</p></div>
                    <div class=figure>
                        <div class=team-logo>
                            <div style=background:url(images/team-logo/logo01.png) class=teamLogoImg></div>
                        </div>
                    </div>
                </div>
                <div class=result-count>
                    <div class=count-number><span class=lose-team>1</span> <span>-</span> <span
                            class=win-team>3</span></div>
                    <div class=dateTime>
                        <div class=dateTime-container><span class=date>may 16,2015</span> <span
                                class=time>15:30pm</span></div>
                        <div class=country-wrap><span class=field>wbeysley stadium</span> <span class=country>(london)</span>
                        </div>
                    </div>
                </div>
                <div class=result-details>
                    <div class="content contentresult"><h4>fc Zulu Ninjas</h4>

                        <p>win</p>

                        <p>Leland Lagos(29)</p>

                        <p>Lelnd Lagos(39)</p></div>
                    <div class="figure figresult">
                        <div class=team-logo>
                            <div style=background:url(images/team-logo/logo02.png) class=teamLogoImg></div>
                        </div>
                    </div>
                </div>
                <div class=center><a href=# class="btn btn-red score-btn">Score board</a></div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>