<?php

$doska = $table->table_params;

function cmp($a, $b)
{
    if ($a["pts"] == $b["pts"]) {
        return 0;
    }
    return ($a["pts"] < $b["pts"]) ? 1 : -1;
}

usort($doska,"cmp");
?>


<div class="table-body">
    <div class="headline01 smallpoint"><?= '№'?></div>
    <div class="headline01 mediumpoint"><?= Yii::t('app', 'Jamoa');?></div>
    <div class="headline01 smallpoint"><?= Yii::t('app', 'W');?></div>
    <div class="headline01 smallpoint"><?= Yii::t('app', 'L');?></div>
    <div class="headline01 smallpoint"><?= Yii::t('app', 'D');?></div>
    <div class="headline01 smallpoint"><?= Yii::t('app', 'G');?></div>
    <div class="headline01 smallpoint"><?= Yii::t('app', 'PTS');?></div>
</div>
<?php $i=1; $team = '';?>
<?php foreach ($doska as $tab):?>
<?php $team = \app\models\Teams::find()->where(['id' => $tab['team_id']])->one();?>
<div class="table-body">
    <div class="headline01 smallpoint"><?= $i++;?></div>
    <div class="headline01 mediumpoint"><?= \app\components\DefaultComponent::name($team->name);?></div>
    <div class="headline01 smallpoint"><?= $tab['win'];?></div>
    <div class="headline01 smallpoint"><?= $tab['lose'];?></div>
    <div class="headline01 smallpoint"><?= $tab['draw'];?></div>
    <div class="headline01 smallpoint"><?= $tab['goals'];?></div>
    <div class="headline01 smallpoint"><?= $tab['pts'];?></div>
</div>
<?php endforeach;?>
