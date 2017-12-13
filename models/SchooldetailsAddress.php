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
 *
 * @property SchoolDetails $schoolDetails
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
            [['school_details_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchoolDetails::className(), 'targetAttribute' => ['school_details_id' => 'id']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolDetails()
    {
        return $this->hasOne(SchoolDetails::className(), ['id' => 'school_details_id']);
    }

    public static function saveFromPost($school_details_id, $post)
    {
        try {
                 $model = new SchooldetailsAddress();

            if (!$model::findOne(['school_details_id' => $school_details_id])) 
             { 
                
                $model->Address_Line_1=$post['SchooldetailsAddress']['Address_Line_1'];
                $model->Address_Line_2=$post['SchooldetailsAddress']['Address_Line_2'];
                $model->Landline_Number=(int)$post['SchooldetailsAddress']['Landline_Number'];
            $model->Alternative_Landline_Number=(int)$post['SchooldetailsAddress']['Alternative_Landline_Number'];
                $model->Cell_Number=(int)$post['SchooldetailsAddress']['Cell_Number'];
                $model->Alternative_Cell_Number=(int)$post['SchooldetailsAddress']['Alternative_Cell_Number'];
                $model->Pincode=(int)$post['SchooldetailsAddress']['Pincode'];
                $model->City=$post['SchooldetailsAddress']['City'];
                $model->State=$post['SchooldetailsAddress']['State'];
                //var_dump($model);
                //exit();
                $model->school_details_id = $school_details_id;
                $model->save();
              }
         } catch(Exception $e) {
            return $this->render('error', ['exception' => $e]);
         }

                return true;
    }
}
