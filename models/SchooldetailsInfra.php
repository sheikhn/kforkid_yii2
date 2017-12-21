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
            'school_infra_id' => 'Select the following school infrastructures provided',
        ];
    }

    public function fields()
    {
        return [
            'infra_name'=> function () {
                return $this->schoolInfra->name;
            },
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

    public static function saveFromPost($school_details_id, $post)
    {
        try {
                foreach ($post['SchooldetailsInfra']['school_infra_id'] as $key => $value) {
                
                $model = new SchooldetailsInfra();
                //checking if already exists
                if (!$model::findOne(['school_details_id' => $school_details_id, 'school_infra_id' => (int)$value])) {
                    $model->school_details_id = $school_details_id;
                    $model->school_infra_id = (int)$value;
                    $model->save();
                }
                }
         } catch(Exception $e) {
            return $this->render('error', ['exception' => $e]);
         }

                return true;
    }
}
