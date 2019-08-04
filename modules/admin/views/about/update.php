<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\About */

$this->title = 'Qizilqum haqida';
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="about-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
