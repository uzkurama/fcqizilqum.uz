<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "matches_options".
 *
 * @property int $id
 * @property array $guest_goals
 * @property array $home_goals
 * @property array $guest_warnings
 * @property array $home_warnings
 * @property array $guest_kicks
 * @property array $home_kicks
 * @property array $guest_transfers
 * @property array $home_transfers
 * @property int $extra_time
 */
class MatchesOptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matches_options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guest_goals', 'home_goals', 'guest_warnings', 'home_warnings', 'guest_kicks', 'home_kicks', 'guest_transfers', 'home_transfers'], 'safe'],
            [['extra_time', 'match_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'match_id' => 'Match ID',
            'guest_goals' => 'Guest Goals',
            'home_goals' => 'Home Goals',
            'guest_warnings' => 'Guest Warnings',
            'home_warnings' => 'Home Warnings',
            'guest_kicks' => 'Guest Kicks',
            'home_kicks' => 'Home Kicks',
            'guest_transfers' => 'Guest Transfers',
            'home_transfers' => 'Home Transfers',
            'extra_time' => 'Extra Time',
        ];
    }
}
