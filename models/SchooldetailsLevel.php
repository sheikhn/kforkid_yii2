<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schooldetails_level".
 *
 * @property integer $id
 * @property integer $school_details_id
 * @property integer $school_level_id
 * @property integer $value
 *
 * @property SchoolDetails $schoolDetails
 * @property SchoolLevel $schoolLevel
 */
class SchooldetailsLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schooldetails_level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_details_id', 'school_level_id'], 'required'],
            [['school_details_id', 'school_level_id', 'value'], 'integer'],
            [['school_details_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchoolDetails::className(), 'targetAttribute' => ['school_details_id' => 'id']],
            [['school_level_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchoolLevel::className(), 'targetAttribute' => ['school_level_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_details_id' => 'School Name',
            'school_level_id' => 'Select the following school levels offered',
            'value' => 'Value'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolDetails()
    {
        return $this->hasOne(SchoolDetails::className(), ['id' => 'school_details_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolLevel()
    {
        return $this->hasOne(SchoolLevel::className(), ['id' => 'school_level_id']);
    }
}
