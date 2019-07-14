<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\InputFile;
use yii\web\JsExpression;
use kartik\select2\Select2;
use yii\helpers\Arrayhelper;
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

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'content')->widget(\yii2jodit\JoditWidget::className(), [
        'settings' => [
            'enableDragAndDropFileToEditor'=>new \yii\web\JsExpression("true"),
        ],
    ]);?>

    <?php echo $form->field($model, 'pic')->widget(InputFile::className(), [
        'language'      => 'ru',
        'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options'       => ['class' => 'form-control'],
        'buttonOptions' => ['class' => 'btn btn-default'],
        'multiple'      => false       // возможность выбора нескольких файлов
    ]);?>

    <?= $form->field($model, 'date')->input('date') ?>

    <?= $form->field($model, 'language_id')->widget(Select2::classname(), [
        'data' => Arrayhelper::map(app\models\Language::find()->where(['status' => '1'])->all(), 'id', 'iso_name'),
        'options' => ['placeholder' => 'Tilni tanlash...'],
        'pluginOptions' => [
            'templateResult' => new JsExpression('format'),
                'templateSelection' => new JsExpression('format'),
                'escapeMarkup' => $escape,
                'allowClear' => true
        ],
    ])->label(false); ?>

    <?= $form->field($model, 'tags')->textInput(['maxlength' => true])->hint('Har bir kalit so\'zini vergul bilan qo\'ying, Masalan: futbol, koptok, ...') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
