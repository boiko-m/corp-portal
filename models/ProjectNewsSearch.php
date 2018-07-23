<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectNews;

/**
 * ProjectNewsSearch represents the model behind the search form of `app\models\ProjectNews`.
 */
class ProjectNewsSearch extends ProjectNews
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'visible'], 'integer'],
            [['avatar', 'title', 'content', 'short_description', 'id_project', 'create_user', 'create_at'], 'safe'],
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
        $query = ProjectNews::find();
        $query->joinWith('project');

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
            'project_news.id' => $this->id,
            'project_news.create_user' => $this->create_user,
            'project_news.visible' => $this->visible,
        ]);

        $query->andFilterWhere(['like', 'project_news.avatar', $this->avatar])
            ->andFilterWhere(['like', 'project_news.title', $this->title])
            ->andFilterWhere(['like', 'project_news.content', $this->content])
            ->andFilterWhere(['like', 'projects.name', $this->id_project])
            ->andFilterWhere(['like', 'project_news.short_description', $this->short_description]);

        if($this->create_at)
          $query->andFilterWhere(['between', 'project_news.create_at', strtotime($this->create_at), strtotime($this->create_at)+86400]);

        return $dataProvider;
    }
}
