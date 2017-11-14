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
 * @property SchooldetailsAddress[] $schooldetailsAddresses
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
            'name' => 'Name',
            'rating' => 'Rating',
            'studentratio' => 'Studentratio',
            'teacherratio' => 'Teacherratio',
            'classroom' => 'Classroom',
            'totalstudents' => 'Totalstudents',
            'playgroundsize' => 'Playgroundsize',
            'campussize' => 'Campussize',
            'sslcfirstclass' => 'Sslcfirstclass',
            'studentmaleratio' => 'Studentmaleratio',
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
    public function getSchooldetailsAddresses()
    {
        return $this->hasMany(SchooldetailsAddress::className(), ['school_details_id' => 'id']);
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
