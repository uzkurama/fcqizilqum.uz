<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Scoreboard */

$this->title = 'Create Scoreboard';
$this->params['breadcrumbs'][] = ['label' => 'Scoreboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scoreboard-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
