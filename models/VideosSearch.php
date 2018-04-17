<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Videos;

/**
 * VideosSearch represents the model behind the search form of `app\models\Videos`.
 */
class VideosSearch extends Videos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_category', 'id_user', 'comment_accept', 'youtube_views', 'right_module'], 'integer'],
            [['name', 'description', 'link', 'img', 'date'], 'safe'],
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
        $query = Videos::find();

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
            'id_category' => $this->id_category,
            'id_user' => $this->id_user,
            'comment_accept' => $this->comment_accept,
            'youtube_views' => $this->youtube_views,
            'right_module' => $this->right_module,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'date', $this->date]);

        return $dataProvider;
    }
}
