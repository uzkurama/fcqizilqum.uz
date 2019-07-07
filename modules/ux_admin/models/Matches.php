<?php

namespace app\modules\ux_admin\models;

use Yii;

/**
 * This is the model class for table "matches".
 *
 * @property int $id
 * @property int $team_home_id
 * @property int $team_guest_id
 * @property int $team_home_score
 * @property int $team_guest_score
 * @property string $team_home_goals
 * @property string $team_guest_goals
 * @property string $date
 * @property string $stadium
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
            [['team_home_id', 'team_guest_id', 'team_home_score', 'team_guest_score', 'team_home_goals', 'team_guest_goals', 'date', 'stadium'], 'required'],
            [['team_home_id', 'team_guest_id', 'team_home_score', 'team_guest_score'], 'integer'],
            [['team_home_goals', 'team_guest_goals'], 'string'],
            [['date'], 'safe'],
            [['stadium'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_home_id' => 'Team Home ID',
            'team_guest_id' => 'Team Guest ID',
            'team_home_score' => 'Team Home Score',
            'team_guest_score' => 'Team Guest Score',
            'team_home_goals' => 'Team Home Goals',
            'team_guest_goals' => 'Team Guest Goals',
            'date' => 'Date',
            'stadium' => 'Stadium',
        ];
    }
}
