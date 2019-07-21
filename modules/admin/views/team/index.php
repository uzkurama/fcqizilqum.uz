<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Qizilqum jamoasi';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    td img {
       width: 150px;
    }
</style>

<div class="team-index">

    <p>
        <?= Html::a('Jamoani to\'ldirish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Ismi',
                'value' => function($model) {
                    return \app\components\DefaultComponent::name($model->name);
                }
            ],
            [
                'label' => 'Pozitsiya',
                'value' => function($model) {
                    return \app\components\DefaultComponent::name($model->post);
                }
            ],
            'pic:image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
