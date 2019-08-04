<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\VideogallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videolar galereyasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videogallery-index">

    <p>
        <?= Html::a('Video qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Sarlavhasi',
                'value' => function($model) {
                    return \app\components\DefaultComponent::name($model->title);
                }
            ],
            'date:date',
            'url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
