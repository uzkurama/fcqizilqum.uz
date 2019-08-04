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
            [['date', 'title'], 'safe'],
            [['type'], 'integer'],
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
            'title' => 'Sarlavha',
            'date' => 'Sanasi',
            'url' => 'Manzili',
            'type' => 'Manba',
        ];
    }
}
