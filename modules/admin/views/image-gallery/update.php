<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Imagegallery */

$this->title = \app\components\DefaultComponent::name($model->title);
$this->params['breadcrumbs'][] = ['label' => 'Imagegalleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => \app\components\DefaultComponent::name($model->title), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="imagegallery-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
