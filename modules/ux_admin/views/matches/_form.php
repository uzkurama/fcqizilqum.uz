<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ux_admin\models\Matches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'team_home_id')->textInput() ?>

    <?= $form->field($model, 'team_guest_id')->textInput() ?>

    <?= $form->field($model, 'team_home_score')->textInput() ?>

    <?= $form->field($model, 'team_guest_score')->textInput() ?>

    <?= $form->field($model, 'team_home_goals')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'team_guest_goals')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'stadium')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
