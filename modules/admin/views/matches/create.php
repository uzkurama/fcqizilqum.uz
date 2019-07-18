<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Matches */

$this->title = 'O\'yin tuzish';
$this->params['breadcrumbs'][] = ['label' => 'O\'yinlar (Matchlar)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matches-create">
    <?php $form = ActiveForm::begin(['action' => ['matches/form']]); ?>
    <?php echo $form->field($model, 'date')->widget('trntv\yii\datetime\DateTimeWidget',
        [
            'clientOptions' => [
                'allowInputToggle' => false,
                'sideBySide' => true,
            ],
        ]
    )->label('Sanasi'); ?>
    <div class="form-group">
        <?= Html::submitButton('Tanlash', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>


