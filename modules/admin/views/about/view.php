<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\About */

$this->title = 'Qizilqum haqida';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="about-view">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'label' => 'Sarlavha',
                'value' => function($model) {
                    return \app\components\DefaultComponent::name($model->title);
                }
            ],
            [
                'label' => 'Pozitsiya',
                'value' => function($model) {
                    return \app\components\DefaultComponent::name($model->description);
                }
            ],
            'type',
            'media:ntext',
        ],
    ]) ?>

</div>
