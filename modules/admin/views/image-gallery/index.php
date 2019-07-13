<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ImagegallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rasmlar galereyasi';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    td img {
       width: 250px;
    }
    .modal-backdrop {
        display: none;
    }
</style>
<div class="imagegallery-index">

    <p>
        <?= Html::a('Rasmlar yuklash', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'date',
            'images',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
