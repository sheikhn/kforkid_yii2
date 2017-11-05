<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SchooldetailsSyllabus;

/**
 * SchooldetailsSyllabusSearch represents the model behind the search form about `app\models\SchooldetailsSyllabus`.
 */
class SchooldetailsSyllabusSearch extends SchooldetailsSyllabus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'school_details_id', 'school_syllabus_id', 'value'], 'integer'],
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
        $query = SchooldetailsSyllabus::find();

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
            'school_details_id' => $this->school_details_id,
            'school_syllabus_id' => $this->school_syllabus_id,
            'value' => $this->value,
        ]);

        return $dataProvider;
    }
}
