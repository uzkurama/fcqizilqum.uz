<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<footer class="footer-type01">
    <div class=container>
        <div class=row>
            <ul class=footer-widget>
                <li class=widget-about>
                    <a href="<?= Yii::$app->homeUrl;?>" style="text-align: center;">
                        <?= Html::img(Yii::$app->request->baseUrl.'/images/logo.png', ['class' => 'img-responsive fc-logo']);?>
                        <h4><?= Yii::t('app', '"Qizilqum" FK');?></h4>
                    </a>
                </li>
                <li class="contacts-footer">
                    <h4><?= Yii::t('app', 'Kontaktlar');?></h4>
                    <?php foreach ($contacts as $c):?>
                    <p>
                        <a href="tel:<?= $c->tel;?>">
                            <i class="fas fa-phone-square"></i>
                            <?= $c->tel;?>
                        </a>
                    </p>
                    <p>
                        <a href="email:<?= $c->email;?>">
                            <i class="fas fa-envelope"></i>
                            <?= $c->email;?>
                        </a>
                    </p>
                    <p>
                        <a target="_blank" href="https://www.google.com/maps/@<?= $c->lat;?>,<?= $c->lng;?>,16z?hl=ru">
                            <i class="fas fa-location-arrow"></i>
                            <?= \app\components\DefaultComponent::name($c->adress);?>
                        </a>
                    </p>
                    <?php endforeach;?>
                </li>
                <li class="widget-footer">
                    <h4 class="text-center" style="margin-bottom: 10px"><?= Yii::t('app', 'Biz ijtimoiy tarmoqlarda');?></h4>
                    <ul class="list-inline clearfix">
                        <?php foreach ($contacts as $c):?>
                        <li>
                            <a href="<?= $c->facebook;?>" class=bigsocial-link>
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $c->twitter;?>" class=bigsocial-link>
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $c->instagram;?>" class=bigsocial-link>
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $c->telegram;?>" class=bigsocial-link>
                                <i class="fab fa-telegram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $c->youtube;?>" class=bigsocial-link>
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $c->mover;?>" class=bigsocial-link>
                                <i class="fas fa-play"></i>
                            </a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </li>
                <li class="credits-footer">
                    <p><?= '© '.Yii::t('app', '"Qizilqum" FK').' '.date('Y');?></p>
                    <p><?= Yii::t('app', 'Barcha huquqlar himoyalangan.');?></p>
                    <p class="text-justify"><?= Yii::t('app', 'Saytdan olingan ma\'lumotlarni chop etganda mazkur saytga havola qilish majburiy');?></p>
                    <p><?= \yii\helpers\Html::a(Yii::t('app', 'Tizimlarini rivojlantirish').':'.' Open Code LLC', 'https://opencode.uz', ['style' => 'font-size: 14px;']);?></p>
                </li>
            </ul>
        </div>
    </div>
</footer>