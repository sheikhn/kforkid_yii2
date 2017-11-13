<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school_infra".
 *
 * @property integer $id
 * @property string $name
 */
class SchoolInfra extends \yii\db\ActiveRecord
{
     const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_infra';
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
}
