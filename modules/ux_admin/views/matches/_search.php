<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ux_admin\models\MatchesSearh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matches-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'team_home_id') ?>

    <?= $form->field($model, 'team_guest_id') ?>

    <?= $form->field($model, 'team_home_score') ?>

    <?= $form->field($model, 'team_guest_score') ?>

    <?php // echo $form->field($model, 'team_home_goals') ?>

    <?php // echo $form->field($model, 'team_guest_goals') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'stadium') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
