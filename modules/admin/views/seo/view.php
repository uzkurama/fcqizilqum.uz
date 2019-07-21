<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Seo */

$this->title = \app\components\DefaultComponent::name($model->title);
$this->params['breadcrumbs'][] = ['label' => 'SEO', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    td img {
       width: 250px;
    }
    .modal-backdrop {
        display: none;
    }
</style>
<div class="seo-view">

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
                'label' => 'Tavsif',
                'value' => function($model) {
                    return \app\components\DefaultComponent::name($model->description);
                }
            ],
            'image:image',
        ],
    ]) ?>

</div>
