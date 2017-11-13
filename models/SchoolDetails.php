<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school_details".
 *
 * @property integer $id
 * @property string $name
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
            [['name', 'rating', 'studentratio', 'teacherratio', 'classroom', 'totalstudents', 'playgroundsize', 'campussize', 'sslcfirstclass', 'studentmaleratio', 'studentfemaleratio', 'teachermaleratio', 'teacherfemaleratio', 'minoritystudents', 'avgyearlycost'], 'required'],
            [['rating', 'studentratio', 'teacherratio', 'classroom', 'totalstudents', 'playgroundsize', 'campussize', 'sslcfirstclass', 'studentmaleratio', 'studentfemaleratio', 'teachermaleratio', 'teacherfemaleratio', 'minoritystudents', 'avgyearlycost'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => ' School Name',
            'rating' => 'School Rating(/10)',
            'studentratio' => 'Student Ratio (Student-Teacher)',
            'teacherratio' => 'Teacher Ratio (Student-Teacher)',
            'classroom' => 'Number of Classrooms',
            'totalstudents' => 'Total Number of Students',
            'playgroundsize' => 'School PlayGround Size(Acres)',
            'campussize' => 'Campus Size(in Acres)',
            'sslcfirstclass' => 'SSLC First Class(%)',
            'studentmaleratio' => 'Student Male Ratio(Student)',
            'studentfemaleratio' => 'Student Female Ratio(Student)',
            'teachermaleratio' => 'Teacher Male Ratio(Teacher)',
            'teacherfemaleratio' => 'Teacher Female Ratio(Teacher)',
            'minoritystudents' => 'Minority Students(%)',
            'avgyearlycost' => 'Average Yearly Cost(Lakhs)',
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
