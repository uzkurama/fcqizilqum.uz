<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use app\models\Language;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\LanguageSearch */
/* @var $form yii\widgets\ActiveForm */

$all = Language::find()->count();
$no_active_count = Language::find()->where('status=:status')->params([':status'=>'0'])->count();
$active_count = Language::find()->where('status=:status')->params([':status'=>'1'])->count();

?>


<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['id'=>'language-search-form']
    ]); ?>
    <div class="col-md-12 no-padding link-a" style="margin: 0" >
        <?php
        if (empty($_GET)) {
            $all_active = 'count-active';
        }else{
            $all_active = '';
        }
        if (isset($_GET['LanguageSearch']['status']) and $_GET['LanguageSearch']['status']==1) {
            $active = 'count-active';
        }else{
            $active = '';
        }
        if (isset($_GET['LanguageSearch']['status']) and $_GET['LanguageSearch']['status']==0) {
            $no_active = 'count-active';
        }else{
            $no_active = '';
        }

        ?>
        <a href="<?= \yii\helpers\Url::to(['/admin/language/index']) ?>" class="btn <?= $all_active?> btn-link">
            <?= Yii::t('yii','All') ?> <span class="count-post"> (<?= $all ?>) </span>
        </a>|
        <a href="<?= \yii\helpers\Url::to(['/admin/language/index','LanguageSearch[status]'=>1]) ?>" class="btn <?= $active?>  btn-link">
            <?= Yii::t('yii','Active') ?> <span class="count-post"> (<?= $active_count ?>) </span>
        </a>|
        <a href="<?= \yii\helpers\Url::to(['/admin/language/index','LanguageSearch[status]'=>0]) ?>" class="btn <?= $no_active?>  btn-link">
            <?= Yii::t('yii','No Active') ?> <span class="count-post"> (<?= $no_active_count ?>) </span>
        </a>
        <span class="col-md-4 pull-right text-right"  style="padding: 0">
            <?= $form->field($model, 'name')->textInput(['style'=>'display:inline-block'])->label(false) ?>
            <?= Html::submitButton(Yii::t('yii', 'Search Language'), ['class' => 'btn btn-default']) ?>
        </span>
    </div>
    <?php ActiveForm::end(); ?>

    <div class="col-md-12  no-padding "  style="margin: 0" >
        <div class="col-md-3"  style="padding: 0">
            <?php
            $form2 = ActiveForm::begin([
                'method' => 'post',
                'action' => ['/admin/default/mark','model'=>'language','controller'=>'language'],
                'options'=>['id'=>'checkBoxForm',  'name'=>'myForm']
            ]);
            ?>
            <div class="col-md-8"  style="padding: 0">
                <?= Select2::widget([
                    'name'=>'action',
                    'data'=>\app\modules\admin\controllers\DefaultController::getStatus1(),
                    'hideSearch'=>true,
                    'options' => [
                        'placeholder' => Yii::t('yii','Bulk Actions'),
                    ],
                    'language' => 'ru',
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])?>
            </div>
            <div class="col-md-3 form-group" >
                <?= Html::submitButton(Yii::t('yii', 'Apply'), ['class' => 'btn btn-default']) ?>
            </div>
            <?php ActiveForm::end(); ?>
            <?php
            $this->registerJs("
                 $('document').ready(function(){
                     $('.table tbody input:checkbox').attr('form','checkBoxForm');
                 });"
            );
            ?>

        </div>
        <div class="col-md-9"  style="padding: 0; padding-left: 10px">
            <div class="col-md-4"  >

                <?php
                // Templating example of formatting each list element
                $url = Yii::$app->request->baseUrl . '/images/flags/';
                $format = <<<ASD
                function format(state) {
                    if (!state.id) return state.text; // optgroup
                    src = '$url'+state.text+ ".gif";
                    return "<img style=\"width:30px; height:20px;\" src=\'" + src + "\'/> " + state.text.split(".")[0];
                }
ASD;

                $escape = new JsExpression("function(m) { return m; }");
                $this->registerJs($format, \yii\web\View::POS_HEAD);
                $data = \yii\helpers\ArrayHelper::map(\app\models\Country::find()->where('`language_code` IS NOT NULL and status="1"')->orderBy('language_code ASC')->all(),'id','language_code','nice_name');

                $data =  \app\modules\admin\controllers\DefaultController::jsonDecodeArray($data,1);

                echo $form->field($model, 'language_code_id')->widget(Select2::classname(), [
                    'data'=>$data,
                    'options' => ['form'=>'language-search-form','placeholder' => Yii::t('yii','Language Code'),],
                    'pluginOptions' => [
                        'templateResult' => new JsExpression('format'),
                        'templateSelection' => new JsExpression('format'),
                        'escapeMarkup' => $escape,
                        'allowClear' => true
                    ],
                ])->label(false);
                ?>
            </div>


            <div class="col-md-2 form-group">
                <?= Html::submitButton(Yii::t('yii', 'Filter'), ['form'=>'language-search-form','class'=> 'btn btn-default']) ?>
            </div>
        </div>
    </div>

</div>

