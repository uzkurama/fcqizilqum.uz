<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Scoreboard */

$this->title = 'Jadval tuzish';
$this->params['breadcrumbs'][] = ['label' => 'Turnirlar jadvallari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scoreboard-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
