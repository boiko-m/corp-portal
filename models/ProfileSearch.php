<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `app\models\Profile`.
 */
class ProfileSearch extends Profile
{
    public $name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sex', 'sip'], 'integer'],
            [['id_1c', 'first_name', 'last_name', 'middle_name', 'birthday', 'name', 'date_job', 'skype', 'phone', 'phone1', 'phone2', 'branch', 'position', 'department', 'cabinet', 'phone_cabinet', 'about', 'category', 'service'], 'safe'],
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
        $query = Profile::find();

        $query->select(['*', new \yii\db\Expression("CONCAT(`last_name`, ' ', `first_name`, ' ', `middle_name`) as `name`")]);
        //$query->select("*, CONCAT(`last_name`, ' ', `first_name`, ' ', `middle_name`) as `name`");

        //echo "<pre>".print_r($query, true)."</pre>";

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
            'birthday' => $this->birthday,
            'date_job' => $this->date_job,
            'sex' => $this->sex,
            'sip' => $this->sip,
        ]);

        $query->andFilterWhere(['like', 'id_1c', $this->id_1c])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'phone1', $this->phone1])
            ->andFilterWhere(['like', 'phone2', $this->phone2])
            ->andFilterWhere(['like', 'branch', $this->branch])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'cabinet', $this->cabinet])
            ->andFilterWhere(['like', 'phone_cabinet', $this->phone_cabinet])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', "CONCAT(`last_name`, ' ', `first_name`, ' ', `middle_name`)", $this->name])
            ->andFilterWhere(['like', 'service', $this->service]);

        return $dataProvider;
    }
}
