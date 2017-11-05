<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SchooldetailsCca;

/**
 * SchooldetailsCcaSearch represents the model behind the search form about `app\models\SchooldetailsCca`.
 */
class SchooldetailsCcaSearch extends SchooldetailsCca
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'school_details_id', 'school_cca_id', 'value'], 'integer'],
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
        $query = SchooldetailsCca::find();

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
            'school_cca_id' => $this->school_cca_id,
            'value' => $this->value,
        ]);

        return $dataProvider;
    }
}
