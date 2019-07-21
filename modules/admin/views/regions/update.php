<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Regions */

$this->title = \app\components\DefaultComponent::name($model->name);
$this->params['breadcrumbs'][] = ['label' => 'Viloyatlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => \app\components\DefaultComponent::name($model->name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
