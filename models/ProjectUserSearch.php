<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectUser;

/**
 * ProjectUserSearch represents the model behind the search form of `app\models\ProjectUser`.
 */
class ProjectUserSearch extends ProjectUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_project', 'id_user', 'id_project_user_group', 'create_at'], 'safe'],
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
        $query = ProjectUser::find();
        $query->joinWith('project');
        $query->joinWith('profile');
        $query->joinWith('projectUserGroup as group');

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
            'project_user.id' => $this->id,
            // 'project_user.create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'projects.name', $this->id_project])
              ->andFilterWhere(['like', 'group.name', $this->id_project_user_group])
              ->andFilterWhere(['like', 'profile.last_name', $this->id_user]);

        if($this->create_at)
          $query->andFilterWhere(['between', 'project_user.create_at', strtotime($this->create_at), strtotime($this->create_at)+86400]);

        return $dataProvider;
    }
}
