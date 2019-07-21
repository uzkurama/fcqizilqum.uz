<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "matches".
 *
 * @property int $id
 * @property int $guest_team
 * @property int $home_team
 * @property int $date
 * @property int $status
 */
class Matches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guest_team', 'home_team', 'date', 'status'], 'required'],
            [['guest_team', 'home_team', 'status', 'region_id' ], 'integer'],
            [['date'], 'safe'],
            [['stadion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guest_team' => 'Guest Team',
            'home_team' => 'Home Team',
            'date' => 'Date',
            'status' => 'Status',
            'region' => 'Region_id',
            'stadion' => 'Stadion',
        ];
    }

    public function getHomeTeams() {
        return $this->hasOne(Teams::className(), ['id' => 'home_team']);
    }

    public function getGuestTeams() {
        return $this->hasOne(Teams::className(), ['id' => 'guest_team']);
    }

    public function getRegion() {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }
}
