<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "main_slider".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property int $language_id
 */
class MainSlider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'language_id'], 'required'],
            [['language_id'], 'integer'],
            [['title', 'image'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'language_id' => 'Language ID',
        ];
    }

    public function getLang()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }
}
