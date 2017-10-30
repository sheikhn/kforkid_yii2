<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SchoolDetails;

/**
 * SchoolDetailsSearch represents the model behind the search form about `app\models\SchoolDetails`.
 */
class SchoolDetailsSearch extends SchoolDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'contact', 'school_infra_id', 'rating', 'school_level_id', 'school_syllabus_id', 'studentratio', 'teacherratio', 'classroom', 'totalstudents', 'playgroundsize', 'campussize', 'sslcfirstclass', 'studentmaleratio', 'studentfemaleratio', 'teachermaleratio', 'teacherfemaleratio', 'minoritystudents', 'school_cca_id', 'avgyearlycost'], 'integer'],
            [['name', 'address'], 'safe'],
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
        $query = SchoolDetails::find();

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
            'contact' => $this->contact,
            'school_infra_id' => $this->school_infra_id,
            'rating' => $this->rating,
            'school_level_id' => $this->school_level_id,
            'school_syllabus_id' => $this->school_syllabus_id,
            'studentratio' => $this->studentratio,
            'teacherratio' => $this->teacherratio,
            'classroom' => $this->classroom,
            'totalstudents' => $this->totalstudents,
            'playgroundsize' => $this->playgroundsize,
            'campussize' => $this->campussize,
            'sslcfirstclass' => $this->sslcfirstclass,
            'studentmaleratio' => $this->studentmaleratio,
            'studentfemaleratio' => $this->studentfemaleratio,
            'teachermaleratio' => $this->teachermaleratio,
            'teacherfemaleratio' => $this->teacherfemaleratio,
            'minoritystudents' => $this->minoritystudents,
            'school_cca_id' => $this->school_cca_id,
            'avgyearlycost' => $this->avgyearlycost,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}