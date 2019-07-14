<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $iso
 * @property string $language_code
 * @property string $name
 * @property string $nice_name
 * @property string $iso3
 * @property integer $num_code
 * @property integer $phone_code
 * @property integer $position
 * @property string $status
 *
 * @property Language $language
 * @property Province[] $provinces
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    public $translate_name;
    public $translate_nice_name;
    public $flag;
    public $page_size;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iso', 'name', 'nice_name', 'phone_code', 'status'], 'required'],
            [['name', 'nice_name', 'status'], 'string'],
            [['num_code', 'phone_code', 'position'], 'integer'],
            [['name', 'nice_name'], 'unique', 'message' => Yii::t('yii', '{attribute} value has already been taken.')],
            [['iso', 'phone_code',], 'unique'],
            [['iso'], 'string', 'max' => 2],
            [['language_code'], 'string', 'max' => 10],
            ['flag', 'file', 'maxSize'=>104857],
            ['flag','file','extensions'=> ['gif']],
            [['iso3'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'iso' => Yii::t('yii', 'ISO'),
            'language_code' => Yii::t('yii', 'Language Code'),
            'name' => Yii::t('yii', 'Name'),
            'nice_name' => Yii::t('yii', 'Nice Name'),
            'iso3' => Yii::t('yii', 'ISO3'),
            'num_code' => Yii::t('yii', 'Number Code'),
            'phone_code' => Yii::t('yii', 'Phone Code'),
            'position' => Yii::t('yii', 'Position'),
            'status' => Yii::t('yii', 'Status'),
            'translate_name' => Yii::t('yii', 'Name'),
            'translate_nice_name' => Yii::t('yii', 'Nice Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['language_code_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinces()
    {
        return $this->hasMany(Province::className(), ['country_id' => 'id']);
    }
}
