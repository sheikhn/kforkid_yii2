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
 * @property integer $school_infra_id
 * @property integer $rating
 * @property integer $school_level_id
 * @property integer $school_syllabus_id
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
 * @property integer $school_cca_id
 * @property integer $avgyearlycost
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
            [['name', 'address', 'contact', 'school_infra_id', 'rating', 'school_level_id', 'school_syllabus_id', 'studentratio', 'teacherratio', 'classroom', 'totalstudents', 'playgroundsize', 'campussize', 'sslcfirstclass', 'studentmaleratio', 'studentfemaleratio', 'teachermaleratio', 'teacherfemaleratio', 'minoritystudents', 'school_cca_id', 'avgyearlycost'], 'required'],
            [['contact', 'school_infra_id', 'rating', 'school_level_id', 'school_syllabus_id', 'studentratio', 'teacherratio', 'classroom', 'totalstudents', 'playgroundsize', 'campussize', 'sslcfirstclass', 'studentmaleratio', 'studentfemaleratio', 'teachermaleratio', 'teacherfemaleratio', 'minoritystudents', 'school_cca_id', 'avgyearlycost'], 'integer'],
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
            'school_infra_id' => 'School Infra ID',
            'rating' => 'Rating',
            'school_level_id' => 'School Level ID',
            'school_syllabus_id' => 'School Syllabus ID',
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
            'school_cca_id' => 'School Cca ID',
            'avgyearlycost' => 'Avgyearlycost',
        ];
    }
}
