<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Language */

$this->title = Yii::t('yii', 'Create Language');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
