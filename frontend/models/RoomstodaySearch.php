<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Roomstoday;

/**
 * RoomstodaySearch represents the model behind the search form about `common\models\Roomstoday`.
 */
class RoomstodaySearch extends Roomstoday
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'site_id', 'price', 'price_m', 'count_rooms', 'square', 'floor', 'floors'], 'integer'],
            [['shortdistrict', 'phone', 'currency', 'type', 'district', 'street', 'street2', 'description', 'state', 'material', 'own_or_business', 'manager', 'coment', 'url', 'site', 'img', 'date'], 'safe'],
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
        $query = Roomstoday::find();

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
            'site_id' => $this->site_id,
            'price' => $this->price,
            'price_m' => $this->price_m,
            'count_rooms' => $this->count_rooms,
            'square' => $this->square,
            'floor' => $this->floor,
            'floors' => $this->floors,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'shortdistrict', $this->shortdistrict])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'street2', $this->street2])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'material', $this->material])
            ->andFilterWhere(['like', 'own_or_business', $this->own_or_business])
            ->andFilterWhere(['like', 'manager', $this->manager])
            ->andFilterWhere(['like', 'coment', $this->coment])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
