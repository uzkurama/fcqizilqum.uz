<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\MatchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'O\'yinlar';
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
<div class="matches-index">





    <?php Pjax::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <?php Modal::begin([
                'toggleButton' => ['label' => 'Qidirish', 'class' => 'btn btn-info'],
            ]);?>
            <?= $this->render('_search', ['model' => $searchModel]); ?>
            <?php Modal::end();?>
            <?= Html::a('Qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'label' => 'Uyda',
                'value' => function($model) {
                    return \app\components\DefaultComponent::name($model->homeTeams->name);
                }
            ],
            [
                'label' => 'Mehmon',
                'value' => function($model) {
                    return \app\components\DefaultComponent::name($model->guestTeams->name);
                }
            ],
            'date:datetime',
            [
                'label' => 'Viloyat',
                'value' => function($model) {
                    return \app\components\DefaultComponent::name($model->region->name);
                }
            ],
            [
                'label' => 'Viloyat',
                'value' => function($model) {
                    return \app\components\DefaultComponent::name($model->stadion);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
