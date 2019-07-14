<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Teams */

$this->title = 'Jamoa tuzish';
$this->params['breadcrumbs'][] = ['label' => 'Jamoalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teams-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
