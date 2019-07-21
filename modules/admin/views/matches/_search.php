<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$r = \app\modules\admin\models\Regions::find()->select(['id', 'name'])->asArray()->all();
$t = \app\modules\admin\models\Teams::find()->select(['id', 'name'])->asArray()->all();

$regions = \app\components\DefaultComponent::dropdown($r);
$teams = \app\components\DefaultComponent::dropdown($t);
?>

<div class="matches-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'home_team')->dropDownList($teams, ['prompt' => 'Tanlash']) ?>

    <?= $form->field($model, 'guest_team')->dropDownList($teams, ['prompt' => 'Tanlash']) ?>

    <?php echo $form->field($model, 'date')->widget('trntv\yii\datetime\DateTimeWidget',
        [
            'clientOptions' => [
                'allowInputToggle' => false,
                'sideBySide' => true,
            ],
        ]
    )->label('Sanasi'); ?>

    <?= $form->field($model, 'status')->dropDownList([0 => 0, 1 => 1], ['prompt' => 'Tanlash']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
