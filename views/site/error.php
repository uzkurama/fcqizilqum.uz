<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<style>
    body {
      background: lightgrey;
    }
</style>

<div class="ui center aligned middle aligned grid" style="min-height: 100vh">
    <div class="column" style="max-width: 500px">
        <h1 class="ui left aligned top attached block header">
            <img src="https://image.flaticon.com/icons/svg/576/576839.svg" class="image"/>
            <div class="content">
                <?= Yii::$app->response->statusCode;?>
                <div class="sub header">
                    <?= nl2br(Html::encode($message)) ?>
                </div>
            </div>
        </h1>
        <div class="ui bottom attached left aligned segment">
            <p>
                <?= Yii::t('app', 'Kechirasiz, siz qidirgan sahifa yo\'q, o\'chirilgan, o\'zgartirilgan yoki vaqtinchalik mavjud emas');?>
            </p>
         <p>
                    <a href="<?= Yii::$app->homeUrl;?>"><?= Yii::t('app', 'Orqaga qaytish');?></a>
                </p>
        </div>
    </div>
</div>