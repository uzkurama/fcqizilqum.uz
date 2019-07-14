<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Videogallery */

$this->title = 'Video qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Videolar galereyasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videogallery-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
