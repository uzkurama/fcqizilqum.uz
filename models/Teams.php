<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teams".
 *
 * @property int $id
 * @property string $name
 * @property string $logo
 * @property int $region_id
 * @property int $language_id
 */
class Teams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teams';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'logo', 'region_id', 'language_id'], 'required'],
            [['region_id', 'language_id'], 'integer'],
            [['name', 'logo'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'logo' => 'Logo',
            'region_id' => 'Region ID',
            'language_id' => 'Language ID',
        ];
    }
}
