<?php

use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Matches */

$this->title = 'O\'yin tuzish';
$this->params['breadcrumbs'][] = ['label' => 'O\'yinlar (Matchlar)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matches-create">
    <?php $form = ActiveForm::begin(['action' => ['matches/form']]); ?>
    <?= $form->field($model, 'date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
        'displayFormat' => 'php:d/m/Y',
        'saveFormat' => 'php:d/m/Y',
        'language' => 'ru',
    ])->label('Sanasi'); ?> ?>
    <?php ActiveForm::end(); ?>
</div>
