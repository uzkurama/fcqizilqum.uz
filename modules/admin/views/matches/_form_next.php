<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$teams = \app\modules\admin\models\Teams::find()->select(['name', 'id'])->indexBy('id')->where(['language_id' => 1])->column();
$regions = \app\modules\admin\models\Regions::find()->select(['name', 'id'])->indexBy('id')->where(['language_id' => 1])->column();
?>

<div class="form">

    <?php $form = ActiveForm::begin(['action' => ['matches/create']]); ?>

    <?= $form->field($model, 'date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
        'displayFormat' => 'php:d/m/Y',
        'saveFormat' => 'php:d/m/Y',
        'language' => 'ru',
    ]); ?>

    <?= $form->field($model, 'home_team')->dropDownList($teams, ['prompt' => 'Tanlash']) ?>

    <?= $form->field($model, 'guest_team')->dropDownList($teams, ['prompt' => 'Tanlash']) ?>

    <?= $form->field($model, 'region_id')->dropDownList($regions, ['prompt' => 'Tanlash']) ?>

    <?= $form->field($model, 'stadion')->textInput() ?>

    <?= $form->field($model, 'status')->radioList([0 => 'Yoq', 1 => 'Ha'])->label('Asosiy sahifa qoyish kerakmi?') ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
