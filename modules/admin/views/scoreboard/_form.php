<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Scoreboard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scoreboard-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'team_id')->textInput() ?>

    <?= $form->field($model, 'win')->textInput() ?>

    <?= $form->field($model, 'lose')->textInput() ?>

    <?= $form->field($model, 'draw')->textInput() ?>

    <?= $form->field($model, 'pts')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
