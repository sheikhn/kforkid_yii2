<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school_cca".
 *
 * @property integer $id
 * @property string $name
 *
 * @property SchooldetailsCca[] $schooldetailsCcas
 */
class SchoolCca extends \yii\db\ActiveRecord
{
     const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_cca';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 75],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['name']; 
        return $scenarios; 
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchooldetailsCcas()
    {
        return $this->hasMany(SchooldetailsCca::className(), ['school_cca_id' => 'id']);
    }
}
