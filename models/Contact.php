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
 * @property array $adress
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
            [['id'], 'required'],
            [['id'], 'integer'],
            [['lng', 'lat'], 'number'],
            [['adress'], 'safe'],
            [['tel', 'email', 'facebook', 'instagram', 'youtube', 'telegram', 'mover'], 'string', 'max' => 500],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tel' => 'Tel',
            'email' => 'Email',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'youtube' => 'Youtube',
            'telegram' => 'Telegram',
            'mover' => 'Mover',
            'lng' => 'Lng',
            'lat' => 'Lat',
            'adress' => 'Adress',
        ];
    }
}
