<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Matches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matches-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-stripted table-hovered table-bordered">
    	<thead>
    		<th>Uyda</th>
    		<th>Mehmonda</th>
    	</thead>
    	<tr>
    		<td><?= $form->field($model, 'home_team')->textInput() ?></td>
    		<td><?= $form->field($model, 'guest_team')->textInput() ?></td>
    	</tr>
    	<tr>
    		<th colspan="2">Ogohlantirishlar:</th>
    	</tr>
    	<tr>
    		<td>
    			<div class="col-md-3">
    			<?= $form->field($model, 'guest_team')->dropDownList([0=> 'Yellow', 1=> 'Red'])->label(false) ?>
    			</div>
    			<div class="col-md-6">
    				<?= $form->field($model, 'home_team')->textInput()->label(false) ?>
				</div>
				<div class="col-md-3">
    				<?= $form->field($model, 'home_team')->textInput()->label(false) ?>
				</div>
    		</td>
    		<td>
    			<div class="col-md-3">
    			<?= $form->field($model, 'guest_team')->dropDownList([0=> 'Yellow', 1=> 'Red'])->label(false) ?>
    			</div>
    			<div class="col-md-6">
    				<?= $form->field($model, 'home_team')->textInput()->label(false) ?>
				</div>
				<div class="col-md-3">
    				<?= $form->field($model, 'home_team')->textInput()->label(false) ?>
				</div>
    		</td>
    	</tr>
    	<tr>
    		<th colspan="2">O'yinchi almashtirish:</th>
    	</tr>
    	<tr>
    		<td><?= $form->field($model, 'home_team')->textInput() ?></td>
    		<td><?= $form->field($model, 'guest_team')->textInput() ?></td>
    	</tr>
    </table>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
