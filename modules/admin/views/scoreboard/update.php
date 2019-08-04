<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Scoreboard */

$this->title = \app\components\DefaultComponent::name($model->name);
$this->params['breadcrumbs'][] = ['label' => 'Turnilar jadvallari', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => \app\components\DefaultComponent::name($model->name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scoreboard-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
