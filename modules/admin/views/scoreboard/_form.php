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

$t = \app\modules\admin\models\Teams::find()->select(['id', 'name'])->asArray()->all();

$teams = \app\components\DefaultComponent::dropdown($t);

?>

<div class="scoreboard-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->widget(MultipleInput::className(), [
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

    <?php echo $form->field($model, 'date')->widget('trntv\yii\datetime\DateTimeWidget',
        [
            'clientOptions' => [
                'allowInputToggle' => false,
                'sideBySide' => true,
            ],
        ]
    )->label('Sanasi'); ?>

    <?= $form->field($model, 'table_params')->widget(MultipleInput::className(), [
        'max' => count($teams),
        'columns' => [
            [
                'name' => 'team_id',
                'type' => 'dropDownList',
                'title' => 'Jamoa (klub)',
                'items' => $teams,
                'options' => ['style' => 'width: 250px'],
            ],
            [
                'name' => 'win',
                'options' => ['type' => 'number'],
                'title' => 'G\'oliblik',
            ],
            [
                'name' => 'lose',
                'options' => ['type' => 'number'],
                'title' => 'Mag\'lubiyatlar',
            ],
            [
                'name' => 'draw',
                'options' => ['type' => 'number'],
                'title' => 'Durranglar',
            ],
            [
                'name' => 'goals',
                'options' => ['type' => 'number'],
                'title' => 'Gollar',
            ],
            [
                'name' => 'pts',
                'options' => ['type' => 'number'],
                'title' => 'Ochkolar',
            ],
        ],
     ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
