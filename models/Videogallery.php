<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videogallery".
 *
 * @property int $id
 * @property array $title
 * @property int $date
 * @property int $type
 * @property string $url
 */
class Videogallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videogallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'date', 'type', 'url'], 'required'],
            [['title'], 'safe'],
            [['date', 'type'], 'integer'],
            [['url'], 'string', 'max' => 500],
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
            'date' => 'Date',
            'type' => 'Type',
            'url' => 'Url',
        ];
    }
}
