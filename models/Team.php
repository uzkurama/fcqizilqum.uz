<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $name
 * @property string $post
 * @property string $pic
 * @property int $lang_id
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'post', 'pic', 'lang_id'], 'required'],
            [['lang_id'], 'integer'],
            [['name'], 'string', 'max' => 1000],
            [['post', 'pic'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'post' => Yii::t('app', 'Post'),
            'pic' => Yii::t('app', 'Pic'),
            'lang_id' => Yii::t('app', 'Lang ID'),
        ];
    }
}
