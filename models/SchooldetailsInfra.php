<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schooldetails_infra".
 *
 * @property integer $id
 * @property integer $school_details_id
 * @property integer $school_infra_id
 * @property integer $value
 *
 * @property SchoolDetails $schoolDetails
 * @property SchoolInfra $schoolInfra
 */
class SchooldetailsInfra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schooldetails_infra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_details_id', 'school_infra_id'], 'required'],
            [['school_details_id', 'school_infra_id', 'value'], 'integer'],
            [['school_details_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchoolDetails::className(), 'targetAttribute' => ['school_details_id' => 'id']],
            [['school_infra_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchoolInfra::className(), 'targetAttribute' => ['school_infra_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_details_id' => 'School Details',
            'school_infra_id' => 'School Infra',
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
    public function getSchoolInfra()
    {
        return $this->hasOne(SchoolInfra::className(), ['id' => 'school_infra_id']);
    }
}
