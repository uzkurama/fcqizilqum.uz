<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Contact */

$this->title = 'Kontaktlar';
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$lang = [];
for ($i = 0; $i < count($model->adress); $i++){
    array_push($lang, $model->adress[$i]['adress_language']);
}
$language = app\models\Language::find()->where(['id' => $lang])->asArray()->all();
//var_dump($language[1]['name']);
//die;
?>
<div class="contact-view">

    <p>
        <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tel',
            'email:email',
            'facebook',
            'instagram',
            'youtube',
            'telegram',
            'mover',
            'lng',
            'lat',
        ],
    ]) ?>
    <table class="table table-striped table-bordered detail-view">
        <thead>
            <tr>
                <th>Tili</th>
                <th>Manzil</th>
            </tr>
        </thead>
        <tbody>
            <?php $b=0; for($a = 0; $a < count($language); $a++):?>
            <tr>
                <th>

                        <?= Html::img(Yii::$app->request->baseUrl.'/images/flags/'.$language[$a]['iso_name'].'.gif', ['class' => 'language_flag']).$language[$a]['name'];?>

                </th>
                <td>
                    <?= $model->adress[$b++]['adress_text'];?>
                </td>
            </tr>
            <?php endfor;?>
        </tbody>
    </table>
</div>
