<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\web\View;
use unclead\multipleinput\MultipleInput;
use mihaildev\elfinder\InputFile;

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

<div class="about-form">

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

    <?= $form->field($model, 'description')->widget(MultipleInput::className(), [
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
                'type' => 'textarea',
                'title' => 'Matni',
            ],
        ],
     ]);
    ?>

    <?= $form->field($model, 'type')->radioList([0 => 'Rasmlar', 1 => 'Video']); ?>

    <?php echo $form->field($model, 'media')->widget(InputFile::className(), [
        'language'      => 'ru',
        'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options'       => ['class' => 'form-control'],
        'buttonOptions' => ['class' => 'btn btn-default'],
        'multiple'      => false       // возможность выбора нескольких файлов
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
