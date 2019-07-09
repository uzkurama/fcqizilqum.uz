<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?>
        <?= Html::a(Yii::t('yii', 'Translate Message'), ['create'], ['class' => 'btn btn-success']) ?>
    </h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="clearfix"></div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'export'=>false,
        'pjax'=>true,
        'striped'=>true,
        'bordered'=>false,
        'hover'=>true,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'responsive'=>true,
        'persistResize'=>false,
        'rowOptions'   => function ($model, $key, $index, $grid) {
            return ['data-id' => $model->id,'class'=>'qe-tr-pointer'];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'options' => ['width' => '15px'],
            ],
            [
                'attribute'=>'translation',
                'hAlign'=>'left',
                'vAlign'=>'middle',
                'value'=>function($model){
                    $actions = '';
                    $actions .= '<div class="post-actions col-md-12" style="padding: 0">
                                    <a  href="'.\yii\helpers\Url::to(['/ud-admin/message/update','id'=>$model->id,'language'=>$model->language]).'">'.
                        Yii::t('yii','Edit') .'
                                    </a> |
                                    <a  href="'.\yii\helpers\Url::to(['/ud-admin/message/view','id'=>$model->id,'language'=>$model->language]).'">'.
                        Yii::t('yii','View') .'
                                    </a> |
                                    <a  class="text-danger" href="'.\yii\helpers\Url::to(['/ud-admin/message/delete','id'=>$model->id,'language'=>$model->language]).'"
                                         data-confirm="'.Yii::t('yii','Are you sure you want to delete this item?').'" data-method="post"
                                    >'.
                        Yii::t('yii','Delete Permanently') .'
                                    </a>
                            </div>';

                    return \yii\helpers\StringHelper::truncateWords($model->translation,'15') .$actions;
                },
                'format'=>"raw"
            ],
            [
                'attribute'=>'id.message',
                'hAlign'=>'left',
                'vAlign'=>'middle',
                'value'=>function($model){
                    return \yii\helpers\StringHelper::truncateWords($model->id0->message,'15');
                },
                'format'=>"raw",
                'label'=>Yii::t('yii','Source Message')
            ],
            [
                'attribute'=>'language',
                'hAlign'=>'left',
                'vAlign'=>'middle',
                'label'=>Yii::t('yii','Language Code'),
                'format'=>"raw",
                'value'=>function($model){
                    $img =  '<img style="width:30px; height:20px;"  src="'.Yii::getAlias('@web_site').'/media/flags/'.$model->language.'.gif">';

                    return $img.' — ' .$model->language;
                }
            ],
        ],
    ]); ?>

</div>
