<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schooldetails_cca".
 *
 * @property integer $id
 * @property integer $school_details_id
 * @property integer $school_cca_id
 * @property integer $value
 *
 * @property SchoolDetails $schoolDetails
 * @property SchoolCca $schoolCca
 */
class SchooldetailsCca extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schooldetails_cca';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_details_id', 'school_cca_id'], 'required'],
            [['school_details_id', 'school_cca_id'], 'integer'],
            [['school_details_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchoolDetails::className(), 'targetAttribute' => ['school_details_id' => 'id']],
            [['school_cca_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchoolCca::className(), 'targetAttribute' => ['school_cca_id' => 'id']],
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
            'school_cca_id' => 'Select the following school Co-Curricular Activities and Extra-Curricular Activites',
            'value' => 'Value',
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
    public function getSchoolCca()
    {
        return $this->hasOne(SchoolCca::className(), ['id' => 'school_cca_id']);
    }

    public static function saveFromPost($school_details_id, $post)
    {
        try {
                
            foreach ($post['SchooldetailsCca']['school_cca_id'] as $key => $value) {
                

                $model = new SchooldetailsCca();
                //checking if already exists
                if (!$model::findOne(['school_details_id' => $school_details_id, 'school_cca_id' => (int)$value])) {

                    $model->school_details_id = $school_details_id;
                    $model->school_cca_id = (int)$value;
                    $id=$model->save();

                }
            }
         } catch(Exception $e) {
            return $this->render('error', ['exception' => $e]);
         }

                return true;
    }

}
