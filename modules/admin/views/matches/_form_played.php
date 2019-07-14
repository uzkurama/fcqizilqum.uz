<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Url;


$teams = app\modules\admin\models\Teams::find()->select(['name', 'id'])->where(['language_id' => \app\modules\admin\models\Language::find()->select('id')->where(['iso_name' => Yii::$app->language])->one()])->column();

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
            <tr>
                <td>
                    <?= $form->field($model, 'guest_team')->dropDownList($teams, ['prompt' => 'Tanlash'])?>
                </td>
                <td>
                    <?= $form->field($model, 'home_team')->dropDownList($teams, ['prompt' => 'Tanlash'])?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= $form->field($options, 'guest_goals')->widget(MultipleInput::className(), [
                        'max' => 1,
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
                        'max' => 1,
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
        </tbody>
    </table>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
