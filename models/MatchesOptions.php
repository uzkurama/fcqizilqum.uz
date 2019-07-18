<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matches_options".
 *
 * @property int $id
 * @property int $match_id
 * @property array $guest_goals
 * @property array $home_goals
 * @property array $guest_warnings
 * @property array $home_warnings
 * @property array $guest_transfers
 * @property array $home_transfers
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
            [['match_id'], 'required'],
            [['match_id'], 'integer'],
            [['guest_goals', 'home_goals', 'guest_warnings', 'home_warnings', 'guest_transfers', 'home_transfers'], 'safe'],
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
            'guest_transfers' => 'Guest Transfers',
            'home_transfers' => 'Home Transfers',
        ];
    }
}