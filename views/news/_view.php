<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;

$base = Yii::$app->request->baseUrl;
$tags = str_replace(' ', '', $model->tags);
$tags = explode(',', $tags);
?>

<div class=blogDetails>
    <div class=blogimg>
        <a href="<?= $base.$model->pic;?>" class="progressive replace">
          <img src="<?= $base.$model->pic;?>" class="preview" alt="" />
        </a>
    </div>
    <div class=blog_info>
        <div class=clearfix>
            <div class=headlinewrap01>
                <div id="item_tag">
                    <?php for($i=0; $i < count($tags); $i++):?>
                        <a href="<?= Url::to(['/news', 'type' => $model->type, 'tags' => $tags[$i]]);?>"><?= $tags[$i];?></a>
                    <?php endfor;?>
                </div>
                <a href="<?= Url::to(['news/view', 'id' => $model->id]);?>">
                    <h4 class=headline02><?= $model->title;?></h4>
                </a>
                <p class="paragraph02 uppercaseheading">
                    <?= Yii::$app->formatter->asDate($model->date, 'd MMMM').', '.Html::tag('span', date('Y', $model->date));?>
                </p>
            </div>
        </div>
        <p class=blog-content><?= StringHelper::truncate($model->content, 300);?></p>
        <div class="blog-detailsfooter clearfix">
            <?= \ymaker\social\share\widgets\SocialShare::widget([
                'configurator'  => 'socialShare',
                'url'           => \yii\helpers\Url::to(['news/view', 'id' => $model->id], true),
                'title'         => StringHelper::truncate($model->title, 50),
                'description'   => StringHelper::truncate($model->content, 200),
                'imageUrl'      => \yii\helpers\Url::home(true).$model->pic,
                'containerOptions' => ['tag' => 'div', 'class' => 'blog-detailsfooter01 clearfix'],
                'linkContainerOptions' => ['tag' => false],
            ]); ?>
            <div class=blog-detailsfooter02>
                <a href="<?= Url::to(['news/view', 'id' => $model->id]);?>" class="btn-small01 btn-red"><?= Yii::t('app', 'Batafsil');?></a>
            </div>
        </div>
    </div>
</div>