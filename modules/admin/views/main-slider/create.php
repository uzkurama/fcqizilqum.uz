<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MainSlider */

$this->title = 'Slayder qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Main Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-slider-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
