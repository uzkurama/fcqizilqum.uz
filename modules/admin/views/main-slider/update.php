<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MainSlider */

$this->params['breadcrumbs'][] = ['label' => 'Slayder', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="main-slider-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
