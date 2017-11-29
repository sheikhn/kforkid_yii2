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

    public function getAddressesAsArray()
    {
    	return $this->hasMany(SchooldetailsAddress::className(), ['school_details_id' => 'id'])->asArray()->all();
    }

    public function getCCasAsArray()
    {
    	return $this->hasMany(SchooldetailsCca::className(), ['school_details_id' => 'id'])->asArray()->all();
    }

    public function getInfrasAsArray()
    {
    	return $this->hasMany(SchooldetailsInfra::className(), ['school_details_id' => 'id'])->asArray()->all();
    }

    public function getLevelsAsArray()
    {
    	return $this->hasMany(SchooldetailsLevel::className(), ['school_details_id' => 'id'])->asArray()->all();
    }



    public function getSyllabiAsArray()
    {
    	return $this->hasMany(SchooldetailsSyllabus::className(), ['school_details_id' => 'id'])->asArray()->all();
    }

    public static function findSchoolsForFilter($filter)
    {
    	$schoolsQuery = SchoolDetails::find();
    	if (array_key_exists('id', $filter)) {
    		$schoolsQuery->andWhere(['id' => $filter['id']]);
    	}

    	if (array_key_exists('cca', $filter)) {
    		self::addCcaToQuery($schoolsQuery, $filter['cca']);

    	}
    	if (array_key_exists('level', $filter)) {
    		self::addLevelToquery($schoolsQuery, $filter['level']);
    	}
    	if (array_key_exists('syllabus', $filter)) {
    		self::addSyllabusToQuery($schoolsQuery, $filter['syllabus']);
    	}
    	if (array_key_exists('infra', $filter)) {
    		self::addInfraToQuery($schoolsQuery, $filter['infra']);
    	}

    	if(array_key_exists('name', $filter)) {
    		$schoolsQuery->andWhere(['like', 'name', $filter['name']]);
    	}

    	if(array_key_exists('city', $filter)) {
    		self::addCityToQuery($schoolsQuery, $filter['city']);
    	}

    	if(array_key_exists('pincode', $filter)) {
            self::addPincodeToQuery($schoolsQuery, $filter['pincode']);    	
        }

    	return $schoolsQuery->asArray()->all();
    }

    /**
        Function adds cca to the find schoold query
        &$schoolsQuery we are taking the reference so the query can continue incase there are other filter
        $ccas is the cca array passed as the get param
    */
    private static function addCcaToQuery(&$schoolsQuery, $ccas){
        foreach ($ccas as $key => $value) {
            $schoolsQuery->leftJoin('schooldetails_cca as cca'.$key, 'cca'.$key.'.`school_details_id` = `school_details`.`id`');
            $schoolsQuery->andWhere(['cca'.$key.'.school_cca_id' => $value]);
        }
        
    }

    private static function addLevelToQuery(&$schoolsQuery, $levels){
        foreach ($levels as $key => $value) {
            $schoolsQuery->leftJoin('schooldetails_level as level'.$key, 'level'.$key.'.`school_details_id` = `school_details`.`id`');
            $schoolsQuery->andWhere(['level'.$key.'.school_level_id' => $value]);
        }
        
    }

    private static function addSyllabusToQuery(&$schoolsQuery, $syllabuses){
        foreach ($syllabuses as $key => $value) {
            $schoolsQuery->leftJoin('schooldetails_syllabus as syllabus'.$key, 'syllabus'.$key.'.`school_details_id` = `school_details`.`id`');
            $schoolsQuery->andWhere(['syllabus'.$key.'.school_syllabus_id' => $value]);
        }
        
    }

    private static function addInfraToQuery(&$schoolsQuery, $infra){
        foreach ($infra as $key => $value) {
            $schoolsQuery->leftJoin('schooldetails_infra as infra'.$key, 'infra'.$key.'.`school_details_id` = `school_details`.`id`');
            $schoolsQuery->andWhere(['infra'.$key.'.school_infra_id' => $value]);
        }   
    }

    private static function addCityToQuery(&$schoolsQuery, $city) {
        $schoolsQuery->leftJoin('schooldetails_address', '`schooldetails_address`.`school_details_id` = `school_details`.`id`');
            $schoolsQuery->andWhere(['like', 'schooldetails_address.city', $city]);
    }

    private static function addPincodeToQuery(&$schoolsQuery, $pincode) {
        $schoolsQuery->leftJoin('schooldetails_address', '`schooldetails_address`.`school_details_id` = `school_details`.`id`');
            $schoolsQuery->andWhere(['like', 'schooldetails_address.city', $pincode]);
    }


  }
