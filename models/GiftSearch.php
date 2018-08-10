<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gift;

/**
 * GiftSearch represents the model behind the search form of `app\models\Gift`.
 */
class GiftSearch extends Gift
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'sum_coin', 'id_gift_type', 'visible'], 'integer'],
            [['name', 'img', 'date'], 'safe'],
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
        $query = Gift::find();
        $query->joinWith('profile');

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
            'gift.id' => $this->id,
            'gift.sum_coin' => $this->sum_coin,
            'gift.id_gift_type' => $this->id_gift_type,
            'gift.visible' => $this->visible,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'ptofile.name', $this->id_user]);

        if($this->date)
          $query->andFilterWhere(['between', 'gift.date', strtotime($this->date), strtotime($this->date)+86400]);

        return $dataProvider;
    }
}
