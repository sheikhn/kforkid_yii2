<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school_syllabus".
 *
 * @property integer $id
 * @property string $syllabus
 * @property integer $state_id
 *
 * @property States $state
 * @property SchooldetailsSyllabus[] $schooldetailsSyllabi
 */
class SchoolSyllabus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_syllabus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['syllabus'], 'required'],
            [['state_id'], 'integer'],
            [['syllabus'], 'string', 'max' => 75],
            [['state_id'], 'unique'],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => States::className(), 'targetAttribute' => ['state_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'syllabus' => 'Syllabus',
            'state_id' => 'State ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(States::className(), ['id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchooldetailsSyllabi()
    {
        return $this->hasMany(SchooldetailsSyllabus::className(), ['school_syllabus_id' => 'id']);
    }
}
