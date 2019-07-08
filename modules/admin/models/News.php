<?php

namespace app\modules\admin\models;

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
            [['title', 'content', 'pic', 'language_id', 'tags'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['language_id'], 'integer'],
            [['title', 'tags'], 'string', 'max' => 2000],
            [['pic'], 'string', 'max' => 500],
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
}
