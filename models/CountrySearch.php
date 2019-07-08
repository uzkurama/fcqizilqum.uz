<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Country;
use yii\data\Sort;

/**
 * CountrySearch represents the model behind the search form about `app\models\Country`.
 */
class CountrySearch extends Country
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'page_size', 'num_code', 'phone_code','status', 'position'], 'integer'],
            [['iso', 'language_code', 'name', 'nice_name', 'iso3'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Country::find();
        $sort = new Sort();

        $sort->defaultOrder = ['id'=>SORT_ASC];
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>$sort,
            'pagination'=>[
                'pageSize'=>(isset($params['CountrySearch']['page_size']) and $params['CountrySearch']['page_size']>=20)?$params['CountrySearch']['page_size']:20
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'num_code' => $this->num_code,
            'phone_code' => $this->phone_code,
            'position' => $this->position,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'iso', $this->iso])
            ->andFilterWhere(['like', 'language_code', $this->language_code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name', $this->nice_name])
            ->andFilterWhere(['like', 'nice_name', $this->nice_name])
            ->andFilterWhere(['like', 'iso3', $this->iso3]);

        return $dataProvider;
    }
}
