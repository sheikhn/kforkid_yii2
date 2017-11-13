<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schooldetails_address".
 *
 * @property integer $id
 * @property integer $school_details_id
 * @property string $Address_Line_1
 * @property string $Address_Line_2
 * @property integer $Landline_Number
 * @property integer $Alternative_Landline_Number
 * @property integer $Cell_Number
 * @property integer $Alternative_Cell_Number
 * @property integer $Pincode
 * @property string $City
 * @property string $State
 */
class SchooldetailsAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schooldetails_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_details_id', 'Address_Line_1', 'Landline_Number', 'Cell_Number', 'Pincode', 'City', 'State'], 'required'],
            [['school_details_id', 'Landline_Number', 'Alternative_Landline_Number', 'Cell_Number', 'Alternative_Cell_Number', 'Pincode'], 'integer'],
            [['Address_Line_1', 'Address_Line_2', 'City', 'State'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_details_id' => 'School Details ID',
            'Address_Line_1' => 'Address  Line 1',
            'Address_Line_2' => 'Address  Line 2',
            'Landline_Number' => 'Landline  Number',
            'Alternative_Landline_Number' => 'Alternative  Landline  Number',
            'Cell_Number' => 'Cell  Number',
            'Alternative_Cell_Number' => 'Alternative  Cell  Number',
            'Pincode' => 'Pincode',
            'City' => 'City',
            'State' => 'State',
        ];
    }
}
