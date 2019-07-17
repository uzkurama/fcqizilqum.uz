<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matches".
 *
 * @property int $id
 * @property int $guest_team
 * @property int $home_team
 * @property string $date
 * @property int $status
 * @property int $region_id
 * @property string $stadion
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
            [['guest_team', 'home_team', 'date', 'status', 'region_id', 'stadion'], 'required'],
            [['guest_team', 'home_team', 'status', 'region_id'], 'integer'],
            [['date'], 'safe'],
            [['stadion'], 'string', 'max' => 100],
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
            'region_id' => 'Region ID',
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
