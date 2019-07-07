<?php

namespace app\modules\ux_admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ux_admin\models\Matches;

/**
 * MatchesSearh represents the model behind the search form of `app\modules\ux_admin\models\Matches`.
 */
class MatchesSearh extends Matches
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'team_home_id', 'team_guest_id', 'team_home_score', 'team_guest_score'], 'integer'],
            [['team_home_goals', 'team_guest_goals', 'date', 'stadium'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Matches::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'team_home_id' => $this->team_home_id,
            'team_guest_id' => $this->team_guest_id,
            'team_home_score' => $this->team_home_score,
            'team_guest_score' => $this->team_guest_score,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'team_home_goals', $this->team_home_goals])
            ->andFilterWhere(['like', 'team_guest_goals', $this->team_guest_goals])
            ->andFilterWhere(['like', 'stadium', $this->stadium]);

        return $dataProvider;
    }
}
