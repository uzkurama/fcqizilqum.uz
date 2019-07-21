<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ScoreboardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Turnirlar jadvali';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scoreboard-index">

    <p>
        <?= Html::a('Yangilash', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Jadval turini kiritish', ['scoreboard-type/create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'Klub'
                    ],
                    'win',
                    'lose',
                    'draw',
                    'pts',
                    'type',
                ],
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'Klub'
                    ],
                    'win',
                    'lose',
                    'draw',
                    'pts',
                    'type',
                ],
            ]); ?>
        </div>
    </div>

    <?php Pjax::end(); ?>

</div>
