<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $pic
 * @property string $date
 * @property int $language_id
 * @property string $tags
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'title', 'content', 'pic', 'language_id', 'tags'], 'required'],
            [['id', 'language_id'], 'integer'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['title', 'tags'], 'string', 'max' => 2000],
            [['pic'], 'string', 'max' => 500],
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
            'title' => 'Title',
            'content' => 'Content',
            'pic' => 'Pic',
            'date' => 'Date',
            'language_id' => 'Language ID',
            'tags' => 'Tags',
        ];
    }

    public function getLang()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }
}
