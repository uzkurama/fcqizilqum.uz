<?php

use kartik\select2\Select2;
use yii\helpers\Url;

$sc = \app\models\Scoreboard::find()->select(['id', 'name'])->asArray()->all();

$scoreboard_type = \app\components\DefaultComponent::dropdown($sc);

$url = Url::to(['site/table-update']);

$js = <<<JS
   
   $(document).ready(function() {
        id_sel = 1;
      $.ajax({
        url:'$url',
        method: 'POST',
        data : {id: id_sel},
        'success': function(data) {
                $('#goal').html(data);
                return false;
            },
        });
    });

    $('#table_sel').change(function() {
        id_sel = $("#table_sel option:selected").val();
      $.ajax({
        url:'$url',
        method: 'POST',
        data : {id: id_sel},
        'success': function(data) {
                $('#goal').html(data);
                return false;
            },
        });
    });
    
    
JS;

$this->registerJs($js, yii\web\View::POS_END);

?>

<div class="matchSchedule_details row">
    <div class=match_next>
        <div class="wrap_match_next">
            <div class=right-padding>
                <h4 class=headline03><?= Yii::t('app', 'Turnirlar jadvali');?></h4>
                <?php echo Select2::widget([
                    'name' => 'sc_type',
                    'id' => 'table_sel',
                    'hideSearch' => true,
                    'data' => $scoreboard_type,
                    'size' => 'sm',
                    'options' => [
                        'multiple' => false,
                        'placeholder' => Yii::t('app', 'Tanlash'),
                    ],
                    'pluginOptions' => [
                        'allowClear' => false,
                        'width' => '85%',
                    ],
                ]);?>
                <span style="color: #fff;"><?= date('d-m-Y', $table->date);?></span>
            </div>
        </div>
    </div>
    <div class=match_versus-wrap>
        <div class=wrap_match-innerdetails>
            <ul class="point_table scrollable">
                <li class=clearfix>
                    <div class="subPoint_table" id="goal">
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
