<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Team */

$this->title = 'Jamoani to\'ldirish';
$this->params['breadcrumbs'][] = ['label' => 'Qizilqum jamoasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
