<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Matches */

$this->title = 'Create Matches';
$this->params['breadcrumbs'][] = ['label' => 'Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matches-create">
    <?php $form = ActiveForm::begin(['action' => ['matches/form']]); ?>
    <?= $form->field($model, 'date', ['inputOptions' => ['onchange' => 'submit()']])->input('date')->label('Sanasi') ?>
    <?php ActiveForm::end(); ?>
</div>

<?php var_dump(date('U'));?>
