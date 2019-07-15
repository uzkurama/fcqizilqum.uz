<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Url;

$regions = \app\modules\admin\models\Regions::find()->select(['name', 'id'])->indexBy('id')->where(['language_id' => 1])->column();
$teams = \app\modules\admin\models\Teams::find()->select(['name', 'id'])->indexBy('id')->where(['language_id' => 1])->column();
?>

<div class="matches-form">


    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'date')->input('date')->label('Sanasi') ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    Uyda
                </th>
                <th>
                    Mehmonda
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

    <?= $form->field($model, 'stadion')->textInput() ?>

    <?= $form->field($model, 'status')->radioList([0 => 'Yoq', 1 => 'Ha'])->label('Asosiy sahifa qoyish kerakmi?')->hint('Eski match uchun "Yoq"ni tanlang') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
