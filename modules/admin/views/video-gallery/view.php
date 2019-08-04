<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Videogallery */

$this->title = \app\components\DefaultComponent::name($model->title);
$this->params['breadcrumbs'][] = ['label' => 'Videolar galereyasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="videogallery-view">

    <p>
        <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
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
                'label' => 'Sarlavhasi',
                'value' => function($model) {
                    return \app\components\DefaultComponent::name($model->title);
                }
            ],
            'date:date',
            'url:url',
        ],
    ]) ?>

</div>
