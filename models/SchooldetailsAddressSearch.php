<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SchooldetailsAddress;

/**
 * SchooldetailsAddressSearch represents the model behind the search form about `app\models\SchooldetailsAddress`.
 */
class SchooldetailsAddressSearch extends SchooldetailsAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'school_details_id', 'Landline_Number', 'Alternative_Landline_Number', 'Cell_Number', 'Alternative_Cell_Number', 'Pincode'], 'integer'],
            [['Address_Line_1', 'Address_Line_2', 'City', 'State'], 'safe'],
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
        $query = SchooldetailsAddress::find();

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
            'Landline_Number' => $this->Landline_Number,
            'Alternative_Landline_Number' => $this->Alternative_Landline_Number,
            'Cell_Number' => $this->Cell_Number,
            'Alternative_Cell_Number' => $this->Alternative_Cell_Number,
            'Pincode' => $this->Pincode,
        ]);

        $query->andFilterWhere(['like', 'Address_Line_1', $this->Address_Line_1])
            ->andFilterWhere(['like', 'Address_Line_2', $this->Address_Line_2])
            ->andFilterWhere(['like', 'City', $this->City])
            ->andFilterWhere(['like', 'State', $this->State]);

        return $dataProvider;
    }
}
