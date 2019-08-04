<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Scoreboard */

$this->title = \app\components\DefaultComponent::name($model->name);
$this->params['breadcrumbs'][] = ['label' => 'Turnirlar jadvallari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$i = 1;
?>
<div class="scoreboard-view">
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

    <h2><?= Html::encode($this->title) ?></h2>
    <h3>Sanasi: <?= date('d-m-Y H:i', $model->date);?></h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <td>№</td>
                <td>Jamoa nomi</td>
                <td>Yutuqlar</td>
                <td>Mag'lubiyatlar</td>
                <td>Durranglar</td>
                <td>Gollar</td>
                <td>Ochkolar</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($model->table_params as $t):?>
        <?php $team = \app\modules\admin\models\Teams::find()->where(['id' => $t['team_id']])->one();?>
            <tr>
                <td><?= $i++;?></td>
                <td><?= \app\components\DefaultComponent::name($team->name);?></td>
                <td><?= $t['win'];?></td>
                <td><?= $t['lose'];?></td>
                <td><?= $t['draw'];?></td>
                <td><?= $t['goals'];?></td>
                <td><?= $t['pts'];?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>


</div>
