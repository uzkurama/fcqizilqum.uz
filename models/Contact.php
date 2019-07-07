<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $tel
 * @property string $email
 * @property string $facebook
 * @property string $instagram
 * @property string $youtube
 * @property string $telegram
 * @property string $mover
 * @property double $lng coordinates
 * @property double $lat coordinates
 * @property string $adress_uz
 * @property string $adress_ru
 * @property string $adress_en
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tel', 'email', 'facebook', 'instagram', 'youtube', 'telegram', 'mover', 'lng', 'lat', 'adress_uz', 'adress_ru', 'adress_en'], 'required'],
            [['lng', 'lat'], 'number'],
            [['tel', 'email', 'facebook', 'instagram', 'youtube', 'telegram', 'mover', 'adress_uz', 'adress_ru', 'adress_en'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tel' => Yii::t('app', 'Tel'),
            'email' => Yii::t('app', 'Email'),
            'facebook' => Yii::t('app', 'Facebook'),
            'instagram' => Yii::t('app', 'Instagram'),
            'youtube' => Yii::t('app', 'Youtube'),
            'telegram' => Yii::t('app', 'Telegram'),
            'mover' => Yii::t('app', 'Mover'),
            'lng' => Yii::t('app', 'Lng'),
            'lat' => Yii::t('app', 'Lat'),
            'adress_uz' => Yii::t('app', 'Adress Uz'),
            'adress_ru' => Yii::t('app', 'Adress Ru'),
            'adress_en' => Yii::t('app', 'Adress En'),
        ];
    }
}
