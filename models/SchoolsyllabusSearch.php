<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SchoolSyllabus;

/**
 * SchoolsyllabusSearch represents the model behind the search form about `app\models\SchoolSyllabus`.
 */
class SchoolsyllabusSearch extends SchoolSyllabus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'state_id'], 'integer'],
            [['syllabus'], 'safe'],
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
        $query = SchoolSyllabus::find();

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
            'state_id' => $this->state_id,
        ]);

        $query->andFilterWhere(['like', 'syllabus', $this->syllabus]);

        return $dataProvider;
    }
}
