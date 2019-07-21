<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "scoreboard".
 *
 * @property int $id
 * @property int $team_id
 * @property int $win
 * @property int $lose
 * @property int $draw
 * @property int $pts
 * @property int $type
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
            [['team_id', 'win', 'lose', 'draw', 'pts', 'type'], 'required'],
            [['team_id', 'win', 'lose', 'draw', 'pts', 'type'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_id' => 'Team ID',
            'win' => 'Win',
            'lose' => 'Lose',
            'draw' => 'Draw',
            'pts' => 'Pts',
            'type' => 'Type',
        ];
    }
}
