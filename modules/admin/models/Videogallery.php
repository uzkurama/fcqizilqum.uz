<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "videogallery".
 *
 * @property int $id
 * @property string $title
 * @property string $date
 * @property string $url
 */
class Videogallery extends \yii\db\ActiveRecord
{
    public $type;
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
            [['title', 'date', 'url', 'type'], 'required'],
            [['date'], 'safe'],
            [['type'], 'integer'],
            [['title'], 'string', 'max' => 500],
            [['url'], 'string', 'max' => 2000],
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
            'url' => 'Url',
            'type' => 'Manba',
        ];
    }
}
