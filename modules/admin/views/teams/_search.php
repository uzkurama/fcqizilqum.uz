<?php

use yii\helpers\Html;
use yii\helpers\Arrayhelper;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Regions;
use kartik\select2\Select2;
use yii\web\View;

$url = \Yii::$app->urlManager->baseUrl . '/images/flags/';
$format = <<< SCRIPT
function format(state) {
    if (!state.id) return state.text; // optgroup
    src = '$url' +  state.text + '.gif'
    return '<img style="width: 20px;" src="' + src + '"/>' + ' ' +  state.text;
}
SCRIPT;
$escape = new JsExpression("function(m) { return m; }");
$this->registerJs($format, View::POS_HEAD);

?>

<div class="teams-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>


    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'region_id')->dropDownList(Regions::find()->select(['name', 'id'])->where(['language_id' => 1])->column(), ['prompt' => 'Tanlash...']) ?>

    <?= $form->field($model, 'language_id')->widget(Select2::classname(), [
        'data' => Arrayhelper::map(app\models\Language::find()->where(['status' => '1'])->all(), 'id', 'iso_name'),
        'options' => ['placeholder' => 'Tilni tanlash...'],
        'pluginOptions' => [
            'templateResult' => new JsExpression('format'),
                'templateSelection' => new JsExpression('format'),
                'escapeMarkup' => $escape,
                'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
