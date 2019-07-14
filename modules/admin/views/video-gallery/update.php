<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Videogallery */

$this->title = $model->title.' ni yangilash';
$this->params['breadcrumbs'][] = ['label' => 'Videolar galereyasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="videogallery-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
