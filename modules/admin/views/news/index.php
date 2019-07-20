<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yangiliklar';
$this->params['breadcrumbs'][] = $this->title;


?>

<style>
    td img {
       width: 250px;
    }
    .flag {
       width: 40px;
    }
    .modal-backdrop {
        display: none;
    }
</style>
<div class="news-index">
    <p>
        <?= Html::a('Yangilik tuzish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php Modal::begin([
        'toggleButton' => ['label' => 'Qidirish', 'class' => 'btn btn-info'],
    ]);?>
    <?= $this->render('_search', ['model' => $searchModel]); ?>
    <?php Modal::end();?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'pic:image',
            'date:date',
            [
                'label' => 'Tili',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::img(Yii::$app->request->baseUrl.'/images/flags/'.$model->lang->iso_name.'.gif', ['class' => 'flag']).' '.$model->lang->name;
                }
            ],
            [
                'label' => 'Turi',
                'value' => function($model) {
                    if($model->type == 0) {
                        return 'Klub yangiliklari';
                    }
                    else if ($model->type == 1) {
                        return 'Boshqarma yangiliklari';
                    }
                }
            ],
            //'tags',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['/news/view', 'id' => $model->id], [ 'title' => Yii::t('yii', 'View'),]);
                    }
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
