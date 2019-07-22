<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Matches */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'O\'yinlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="matches-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'status',
        ],
    ]) ?>

</div>
