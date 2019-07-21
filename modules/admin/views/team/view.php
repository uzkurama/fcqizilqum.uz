<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Team */

$this->title = \app\components\DefaultComponent::name($model->name);
$this->params['breadcrumbs'][] = ['label' => 'Qizilqum jamoasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    td img {
       width: 150px;
    }
</style>
<div class="team-view">

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
        ],
    ]) ?>

</div>
