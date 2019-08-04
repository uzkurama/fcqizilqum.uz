<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
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


$r = \app\modules\admin\models\Regions::find()->select(['id', 'name'])->asArray()->all();
$t = \app\modules\admin\models\Teams::find()->select(['id', 'name'])->asArray()->all();

$regions = \app\components\DefaultComponent::dropdown($r);
$teams = \app\components\DefaultComponent::dropdown($t);
?>

<div class="matches-form">


    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'date')->widget('trntv\yii\datetime\DateTimeWidget',
        [
            'phpDatetimeFormat' => 'dd.MM.yyyy, HH:mm:ss',
            'clientOptions' => [
                'allowInputToggle' => false,
                'sideBySide' => true,
            ],
        ]
    )->label('Sanasi'); ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    Mehmonda
                </th>
                <th>
                    Uyda
                </th>
            </tr>
        </thead>
        <tbody>
            <tr id="teams">
                <td>
                    <?= $form->field($model, 'guest_team')->dropDownList($teams, ['prompt' => 'Tanlash'])?>
                </td>
                <td>
                    <?= $form->field($model, 'home_team')->dropDownList($teams, ['prompt' => 'Tanlash'])?>
                </td>
            </tr>
            <tr id="goals">
                <td>
                    <?= $form->field($options, 'guest_goals')->widget(MultipleInput::className(), [
                        'max' => 99,
                        'min' => 1,
                        'columns' => [
                            [
                                'name'  => 'time',
                                'title' => 'Vaqti',
                                'type' => 'textInput',
                            ],
                            [
                                'name'  => 'player',
                                'title' => 'O\'yinchi',
                                'type' => 'textInput',
                            ],
                        ],
                     ])->label('Gollar');
                    ?>
                </td>
                <td>
                    <?= $form->field($options, 'home_goals')->widget(MultipleInput::className(), [
                        'max' => 99,
                        'min' => 1,
                        'columns' => [
                            [
                                'name'  => 'time',
                                'title' => 'Vaqti',
                                'type' => 'textInput',
                            ],
                            [
                                'name'  => 'player',
                                'title' => 'O\'yinchi',
                                'type' => 'textInput',
                            ],
                        ],
                     ])->label('Gollar');
                    ?>
                </td>
            </tr>
            <tr id="warnings">
                <td>
                    <?= $form->field($options, 'guest_warnings')->widget(MultipleInput::className(), [
                        'max' => 99,
                        'min' => 1,
                        'columns' => [
                            [
                                'name'  => 'type',
                                'title' => 'Turi',
                                'type' => 'dropDownList',
                                'items' => [0 => 'Sariq', 1 => 'Qizil'],
                            ],
                            [
                                'name'  => 'time',
                                'title' => 'Vaqti',
                                'type' => 'textInput',
                            ],
                            [
                                'name'  => 'player',
                                'title' => 'O\'yinchi',
                                'type' => 'textInput',
                            ],
                        ],
                     ])->label('Jarimalar');
                    ?>
                </td>
                <td>
                    <?= $form->field($options, 'home_warnings')->widget(MultipleInput::className(), [
                        'max' => 99,
                        'min' => 1,
                        'columns' => [
                            [
                                'name'  => 'type',
                                'title' => 'Turi',
                                'type' => 'dropDownList',
                                'items' => [0 => 'Sariq', 1 => 'Qizil'],
                            ],
                            [
                                'name'  => 'time',
                                'title' => 'Vaqti',
                                'type' => 'textInput',
                            ],
                            [
                                'name'  => 'player',
                                'title' => 'O\'yinchi',
                                'type' => 'textInput',
                            ],
                        ],
                     ])->label('Jarimalar');
                    ?>
                </td>
            </tr>
            <tr id="transfers">
                <td>
                    <?= $form->field($options, 'guest_transfers')->widget(MultipleInput::className(), [
                        'max' => 99,
                        'min' => 1,
                        'columns' => [
                            [
                                'name'  => 'time',
                                'title' => 'Vaqti',
                                'type' => 'textInput',
                            ],
                            [
                                'name'  => 'player',
                                'title' => 'O\'yinchi',
                                'type' => 'textInput',
                            ],
                        ],
                     ])->label('Zamenalar');
                    ?>
                </td>
                <td>
                    <?= $form->field($options, 'home_transfers')->widget(MultipleInput::className(), [
                        'max' => 99,
                        'min' => 1,
                        'columns' => [
                            [
                                'name'  => 'time',
                                'title' => 'Vaqti',
                                'type' => 'textInput',
                            ],
                            [
                                'name'  => 'player',
                                'title' => 'O\'yinchi',
                                'type' => 'textInput',
                            ],
                        ],
                     ])->label('Zamenalar');
                    ?>
                </td>
            </tr>
        </tbody>
    </table>

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

    <?= $form->field($model, 'status')->radioList([0 => 'Yoq', 1 => 'Ha'])->label('Asosiy sahifa qoyish kerakmi?')->hint('Eski match uchun "Yoq"ni tanlang') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
