<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TeamsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jamoalar';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    td img {
       width: 150px;
    }
    .modal-backdrop {
        display: none;
    }
</style>

<div class="teams-index">

    <p>
        <?= Html::a('Jamoa tuzish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
        <?php Modal::begin([
        'toggleButton' => ['label' => 'Qidirish', 'class' => 'btn btn-info'],
    ]);?>
    <?= $this->render('_search', ['model' => $searchModel]); ?>
    <?php Modal::end();?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'logo:image',
            'region_id',
            'language_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
