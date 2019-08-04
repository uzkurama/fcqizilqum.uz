<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "scoreboard".
 *
 * @property int $id
 * @property int $name
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
            [['table_params', 'date', 'name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Nomi'),
            'date' => Yii::t('app', 'Sanasi'),
            'table_params' => Yii::t('app', 'Jadval parametrlari'),
        ];
    }

    public function getTeam() {
        return $this->hasMany(Teams::className(), ['id' => 'table_params']);
    }
}
