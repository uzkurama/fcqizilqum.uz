<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property integer $id
 * @property string $name
 * @property integer $language_code_id
 * @property integer $position
 * @property string $status
 * @property string $created_at
 *
 * @property Country $languageCode
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'language_code_id','status'], 'required'],
            [['name', 'status'], 'string'],
            [['language_code_id', 'position'], 'integer'],
            [['created_at'], 'safe'],
            [['name','language_code_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'name' => Yii::t('yii', 'Name'),
            'language_code_id' => Yii::t('yii', 'Language Code'),
            'position' => Yii::t('yii', 'Position'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Created Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageCode()
    {
        return $this->hasOne(Country::className(), ['id' => 'language_code_id']);
    }
}
