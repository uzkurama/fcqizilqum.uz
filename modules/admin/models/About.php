<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property int $id
 * @property array $title
 * @property array $description
 * @property int $type
 * @property string $media
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'type', 'media'], 'required'],
            [['title', 'description'], 'safe'],
            [['type'], 'integer'],
            [['media'], 'string'],
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
            'description' => 'Ma\lumoti',
            'type' => 'Turi',
            'media' => 'Manzili',
        ];
    }
}
