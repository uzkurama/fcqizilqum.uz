<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "imagegallery".
 *
 * @property int $id
 * @property string $title
 * @property string $date
 * @property array $images
 */
class Imagegallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagegallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'date', 'images'], 'required'],
            [['date', 'images'], 'safe'],
            [['title'], 'string', 'max' => 500],
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
            'images' => 'Images',
        ];
    }
}
