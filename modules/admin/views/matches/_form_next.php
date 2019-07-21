<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\web\View;
use unclead\multipleinput\MultipleInput;

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


$r = \app\modules\admin\models\Regions::find()->select(['id', 'name'])->asArray()->all();
$t = \app\modules\admin\models\Teams::find()->select(['id', 'name'])->asArray()->all();

$regions = \app\components\DefaultComponent::dropdown($r);
$teams = \app\components\DefaultComponent::dropdown($t);

?>

<div class="form">

    <?php $form = ActiveForm::begin(['action' => ['matches/create']]); ?>

    <?php echo $form->field($model, 'date')->widget('trntv\yii\datetime\DateTimeWidget',
        [
            'clientOptions' => [
                'allowInputToggle' => false,
                'sideBySide' => true,
            ],
        ]
    )->label('Sanasi'); ?>

    <?= $form->field($model, 'home_team')->dropDownList($teams, ['prompt' => 'Tanlash']) ?>

    <?= $form->field($model, 'guest_team')->dropDownList($teams, ['prompt' => 'Tanlash']) ?>

    <?= $form->field($model, 'region_id')->dropDownList($regions, ['prompt' => 'Tanlash']) ?>

    <?= $form->field($model, 'stadion')->widget(MultipleInput::className(), [
        'max' => 99,
        'columns' => [
            [
                'name'  => 'language',
                'type'  => \kartik\select2\Select2::className(),
                'title' => 'Tili',
                'options' => [
                    'options' => [
                        'placeholder' => 'Tilni tanlash...',
                    ],
                    'data' => Arrayhelper::map(app\models\Language::find()->where(['status' => '1'])->all(), 'id', 'iso_name'),
                    'pluginOptions' => [
                        'templateResult' => new JsExpression('format'),
                            'templateSelection' => new JsExpression('format'),
                            'escapeMarkup' => $escape,
                            'allowClear' => true
                    ],
                ],
            ],
            [
                'name' => 'text',
                'type' => 'textInput',
                'title' => 'Matni',
            ],
        ],
     ]);
    ?>

    <?= $form->field($model, 'status')->radioList([0 => 'Yoq', 1 => 'Ha'])->label('Asosiy sahifa qoyish kerakmi?') ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
