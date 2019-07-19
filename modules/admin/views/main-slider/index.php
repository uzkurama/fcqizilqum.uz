<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\MainSliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slayder';
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    td img {
        width: 40px;
    }
</style>
<div class="main-slider-index">

    <p>
        <?= Html::a('Qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'image:image',
            [
                'label' => 'Tili',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::img(Yii::$app->request->baseUrl.'/images/flags/'.$model->lang->iso_name.'.gif', ['class' => 'flag']).' '.$model->lang->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
