<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Team */

$this->title = \app\components\DefaultComponent::name($model->name). ' ni yangilash';
$this->params['breadcrumbs'][] = ['label' => 'Qizilqum jamoasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => \app\components\DefaultComponent::name($model->name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="team-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
