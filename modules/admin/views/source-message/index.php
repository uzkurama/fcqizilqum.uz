<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SourceMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Source messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-index">

    <h1><?= Html::encode($this->title) ?></h1>
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
                'attribute'=>'message',
                'hAlign'=>'left',
                'vAlign'=>'middle',
                'value'=>function($model){
                    $actions = '';
                    $actions .= '<div class="post-actions col-md-12" style="padding: 0">
                                    <a  href="'.\yii\helpers\Url::to(['/ud-admin/source-message/update','id'=>$model->id]).'">'.
                        Yii::t('yii','Edit') .'
                                    </a> |
                                    <a  href="'.\yii\helpers\Url::to(['/ud-admin/source-message/view','id'=>$model->id]).'">'.
                        Yii::t('yii','View') .'
                                    </a> |
                                    <a  class="text-danger" href="'.\yii\helpers\Url::to(['/ud-admin/source-message/delete','id'=>$model->id]).'"
                                         data-confirm="'.Yii::t('yii','Are you sure you want to delete this item?').'" data-method="post"
                                    >'.
                        Yii::t('yii','Delete Permanently') .'
                                    </a>
                            </div>';

                    return $model->message .$actions;
                },
                'format'=>"raw"
            ],
        ],
    ]); ?>

</div>
