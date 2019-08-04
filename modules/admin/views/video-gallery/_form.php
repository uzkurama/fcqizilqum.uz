<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Arrayhelper;
use yii\web\JsExpression;

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

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Videogallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="videogallery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->widget(MultipleInput::className(), [
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
            'phpDatetimeFormat' => 'dd.MM.yyyy, 12:00:00',
            'momentDatetimeFormat' => 'DD.MM.YYYY',
            'clientOptions' => [
                'allowInputToggle' => false,
                'sideBySide' => true,
            ],
        ]
    )->label('Sanasi'); ?>

    <?= $form->field($model, 'type')->radioList([0 => 'Mover', 1 => 'Youtube'])->label('Manba') ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
