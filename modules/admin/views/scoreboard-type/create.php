<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ScoreboardType */

$this->title = 'Create Scoreboard Type';
$this->params['breadcrumbs'][] = ['label' => 'Scoreboard Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scoreboard-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
