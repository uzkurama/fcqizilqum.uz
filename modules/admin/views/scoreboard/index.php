<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ScoreboardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Turnirlar jadvallari';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scoreboard-index">

    <p>
        <?= Html::a('Tuzish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => 'Nomi',
                'value' => function($model) {
                    return \app\components\DefaultComponent::name($model->name);
                }
            ],
            'date:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
