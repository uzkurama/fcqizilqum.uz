<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;

if ($model->type == 0){
    $this->title = Yii::t('app','Klub yangiliklari');
}
elseif ($model->type == 1){
    $this->title = Yii::t('app','Boshqarma yangiliklari');
}
else{
    $this->title = Yii::t('app','Yangiliklari');
}
$this->params['breadcrumbs'][] = $this->title;
$tags = str_replace(' ', '', $model->tags);
$tags = explode(',', $tags);
$base = Yii::$app->request->baseUrl;
?>

<section class=innerpage_all_wrap>
    <div class=container>
        <div class=innerWrapper>
            <article class=contentinner>
                <div class=blogDetails>
                    <div class=blogimg>
                        <a href="<?= $base.$model->pic;?>" class="progressive replace">
                          <img src="<?= $base.$model->pic;?>" class="preview" alt="" />
                        </a>
                    </div>
                    <div class=blog_info>
                        <div class=clearfix>
                            <div class=headlinewrap01>
                                <h4 class=headline02><?= $model->title;?></h4>
                                <p class="paragraph02 uppercaseheading">
                                    <?= Yii::$app->formatter->asDate($model->date, 'd MMMM').', '.Html::tag('span', date('Y', $model->date));?>
                                </p>
                            </div>
                        </div>
                        <p class=blog-content><?= $model->content;?></p>
                        <div class="clearfix">
                            <h4><?= Yii::t('app', 'Teglar');?></h4>
                            <ul class="list-inline tag_box">
                                <?php for($i=0; $i<count($tags); $i++):?>
                                <li><a href="<?= Url::to(['/news', 'type' => $model->type, 'tags' => $tags[$i]]);?>"><?= $tags[$i];?></a></li>
                                <?php endfor;?>
                            </ul>
                        </div>
                        <?php echo Html::tag('h4', Yii::t('app', 'Ulashing'), ['style' => 'margin-top: 15px;']);
                        echo \ymaker\social\share\widgets\SocialShare::widget([
                            'configurator'  => 'socialShare',
                            'url'           => \yii\helpers\Url::to(['news/view', 'id' => $model->id], true),
                            'title'         => StringHelper::truncate($model->title, 50),
                            'description'   => StringHelper::truncate($model->content, 200),
                            'imageUrl'      => \yii\helpers\Url::home(true).$model->pic,
                            'containerOptions' => ['tag' => 'div', 'class' => 'blog-detailsfooter01 clearfix'],
                            'linkContainerOptions' => ['tag' => false],
                        ]); ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </article>
            <?= \app\widgets\SideWidget::widget();?>
        </div>
    </div>
</section>