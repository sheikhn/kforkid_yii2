<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schooldetails_syllabus".
 *
 * @property integer $id
 * @property integer $school_details_id
 * @property integer $school_syllabus_id
 * @property integer $value
 *
 * @property SchoolDetails $schoolDetails
 * @property SchoolSyllabus $schoolSyllabus
 */
class SchooldetailsSyllabus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schooldetails_syllabus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_details_id', 'school_syllabus_id'], 'required'],
            [['school_details_id', 'school_syllabus_id', 'value'], 'integer'],
            [['school_details_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchoolDetails::className(), 'targetAttribute' => ['school_details_id' => 'id']],
            [['school_syllabus_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchoolSyllabus::className(), 'targetAttribute' => ['school_syllabus_id' => 'id']],
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
            'school_syllabus_id' => 'Select the following syllabus offered',
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
    public function getSchoolSyllabus()
    {
        return $this->hasOne(SchoolSyllabus::className(), ['id' => 'school_syllabus_id']);
    }

    public static function saveFromPost($school_details_id, $post)
    {
        try {
                foreach ($post['SchooldetailsSyllabus']['school_syllabus_id'] as $key => $value) {
                
                   $model = new SchooldetailsSyllabus();
                    //checking if already exists
                    if (!$model::findOne(['school_details_id' => $school_details_id, 'school_syllabus_id' => (int)$value])) {
                        $model->school_details_id = $school_details_id;
                        $model->school_syllabus_id = (int)$value;
                        $model->save();
                    }
                }
         } catch(Exception $e) {
            return $this->render('error', ['exception' => $e]);
         }

                return true;
    }
}
