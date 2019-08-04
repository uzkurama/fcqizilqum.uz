<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scoreboard".
 *
 * @property int $id
 * @property array $name
 * @property int $date
 * @property array $table_params
 */
class Scoreboard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scoreboard';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date', 'table_params'], 'required'],
            [['name', 'table_params'], 'safe'],
            [['date'], 'integer'],
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
            'date' => 'Date',
            'table_params' => 'Table Params',
        ];
    }
}
