<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school_details".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property integer $contact
 * @property integer $rating
 * @property integer $studentratio
 * @property integer $teacherratio
 * @property integer $classroom
 * @property integer $totalstudents
 * @property integer $playgroundsize
 * @property integer $campussize
 * @property integer $sslcfirstclass
 * @property integer $studentmaleratio
 * @property integer $studentfemaleratio
 * @property integer $teachermaleratio
 * @property integer $teacherfemaleratio
 * @property integer $minoritystudents
 * @property integer $avgyearlycost
 *
 * @property SchooldetailsCca[] $schooldetailsCcas
 * @property SchooldetailsInfra[] $schooldetailsInfras
 * @property SchooldetailsLevel[] $schooldetailsLevels
 * @property SchooldetailsSyllabus[] $schooldetailsSyllabi
 */
class SchoolDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'contact', 'rating', 'studentratio', 'teacherratio', 'classroom', 'totalstudents', 'playgroundsize', 'campussize', 'sslcfirstclass', 'studentmaleratio', 'studentfemaleratio', 'teachermaleratio', 'teacherfemaleratio', 'minoritystudents', 'avgyearlycost'], 'required'],
            [['contact', 'rating', 'studentratio', 'teacherratio', 'classroom', 'totalstudents', 'playgroundsize', 'campussize', 'sslcfirstclass', 'studentmaleratio', 'studentfemaleratio', 'teachermaleratio', 'teacherfemaleratio', 'minoritystudents', 'avgyearlycost'], 'integer'],
            [['name', 'address'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'contact' => 'Contact',
            'rating' => 'Rating',
            'studentratio' => 'Student Ratio',
            'teacherratio' => 'Teacher Ratio',
            'classroom' => 'Classroom',
            'totalstudents' => 'Total Students',
            'playgroundsize' => 'Play Ground Size',
            'campussize' => 'Campus size',
            'sslcfirstclass' => 'Sslc first class',
            'studentmaleratio' => 'Student male ratio',
            'studentfemaleratio' => 'Studentfemaleratio',
            'teachermaleratio' => 'Teachermaleratio',
            'teacherfemaleratio' => 'Teacherfemaleratio',
            'minoritystudents' => 'Minoritystudents',
            'avgyearlycost' => 'Avgyearlycost',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchooldetailsCcas()
    {
        return $this->hasMany(SchooldetailsCca::className(), ['school_details_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchooldetailsInfras()
    {
        return $this->hasMany(SchooldetailsInfra::className(), ['school_details_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchooldetailsLevels()
    {
        return $this->hasMany(SchooldetailsLevel::className(), ['school_details_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchooldetailsSyllabi()
    {
        return $this->hasMany(SchooldetailsSyllabus::className(), ['school_details_id' => 'id']);
    }
}
