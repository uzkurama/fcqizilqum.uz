<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Teams */

$this->title = \app\components\DefaultComponent::name($model->name).' jamoasini yangilash';
$this->params['breadcrumbs'][] = ['label' => 'Jamoalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => \app\components\DefaultComponent::name($model->name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="teams-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
