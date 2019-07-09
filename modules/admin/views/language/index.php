<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LanguageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Languages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-index">

    <h1><?= Html::encode($this->title) ?>
        <?= Html::a(Yii::t('yii', 'Create Language'), ['create'], ['class' => 'btn btn-success']) ?>
    </h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
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
            [
                'class'=>'kartik\grid\CheckboxColumn',
                'width'=>'10px',
                'rowSelectedClass'=>GridView::TYPE_INFO,
                'mergeHeader'=>false,
                'checkboxOptions' => function($model) {
                    return ['value' => $model->id];
                },
                'hAlign'=>'center',
                'vAlign'=>'top',
            ],
            [
                'attribute'=>'name',
                'hAlign'=>'left',
                'vAlign'=>'middle',
                'value'=>function($model){
                        $status = '';
                        $actions = '';
                        $actions .= '<div class="post-actions col-md-12" style="padding: 0">
                                    <a  href="'.\yii\helpers\Url::to(['/ud-admin/language/update','id'=>$model->id]).'">'.
                            Yii::t('yii','Edit') .'
                                    </a> |';
                        if ($model->status==0) {
                            $actions .= ' <a  data-method="post" href="'.\yii\helpers\Url::to(['/ud-admin/default/status','id'=>$model->id,'status'=>1,'model'=>'language', 'controller'=>'language']).'">'.
                                Yii::t('yii','Active') .'
                                    </a> |';
                            $status = '<span class="text-strong"> — '.Yii::t('yii','No Active').'</span>';
                        }
                        else{
                            $actions .= ' <a  data-method="post" href="'.\yii\helpers\Url::to(['/ud-admin/default/status','id'=>$model->id,'status'=>0,'model'=>'language', 'controller'=>'language']).'">'.
                                Yii::t('yii','No Active') .'
                                    </a> |';
                        }
//                        if($model->languageCode->language_code!='en'){
                            $actions .= ' <a  class="text-danger" href="'.\yii\helpers\Url::to(['/ud-admin/language/delete','id'=>$model->id]).'"
                                         data-confirm="'.Yii::t('yii','Are you sure you want to delete this item?').'" data-method="post"
                                    >'.
                                Yii::t('yii','Delete Permanently') .'
                                    </a>';

//                        }

                        $actions .= '    </div>';

                    return $model->name .$status.$actions;
                },
                'format'=>"raw"
            ],
            [
                'attribute' => 'language_code_id',
                'format'=>'raw',
                'value'=>'languageCode.language_code',
                'options' => ['width' => '12%'],
                'hAlign'=>'center',
                'vAlign'=>'middle',
            ],
            [
                'attribute' => 'language_code_id',
                'value'=>function($model){
                    return '<img style="width:30px; height:20px;"  src="'.Yii::getAlias('@web_site').'/media/flags/'.$model->languageCode->language_code.'.gif">';
                },
                'hAlign'=>'center',
                'vAlign'=>'middle',
                'format'=>'raw',
                'label'=>Yii::t('yii','Flag'),
                'options' => ['width' => '8%'],
            ],
            [
                'attribute' => 'position',
                'format'=>'raw',
                'options' => ['width' => '8%'],
                'hAlign'=>'center',
                'vAlign'=>'middle',
            ],
            [
                'attribute' => 'created_at',
                'hAlign'=>'center',
                'vAlign'=>'middle',
                'options' => ['width' => '15%'],
                'value'=>function($model){
                        return \app\modules\admin\controllers\DefaultController::getDate($model->created_at);
                },
                'label'=>Yii::t('yii','Date'),
                'format'=>"raw"
            ],
        ],
    ]); ?>

</div>
