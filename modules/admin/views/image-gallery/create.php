<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Imagegallery */

$this->title = 'Rasmlarni yuklash';
$this->params['breadcrumbs'][] = ['label' => 'Rasmlar galereyasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagegallery-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
