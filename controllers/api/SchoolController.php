<?php

namespace app\controllers\api;

use Yii;
use app\models\SchoolDetails;
use app\models\SchoolDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class SchoolController extends Controller
{
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}

	public function actionGetSchools()
	{        
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        //use Filter params in where conditions
		$getParams = Yii::$app->request->get();

		//$schools contains the array of all schools details. array of arrays
		$schools = SchoolDetails::findSchoolsForFilter($getParams);			

		$schoolList= [];
		foreach ($schools as $school) {
            //$school is the array of one school
            //get Model from id
			$schoolDetails = SchoolDetails::find()->where(['id'=>$school['id']])->one();

            //After you get the model using relations get all data in array format
            //from the custom functions we created
			$school['address'] = $schoolDetails->getAddressesAsArray();

			$school['cca'] = $schoolDetails->getCCasAsArray();
			$school['infra'] = $schoolDetails->getInfrasAsArray();
			$school['levels'] = $schoolDetails->getLevelsAsArray();
			$school['syllabus'] = $schoolDetails->getSyllabiAsArray();
			array_push($schoolList, $school);
		}



		return array('status'=>true,'data'=> $schoolList);

	}

	public function actionGetSchool($id)
	{   


		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

		$schoolArray= [];

        //Gets schoolDetails Modal
		$schoolDetails = SchoolDetails::find()->where(['id'=>$id])->one();
        //GEts school details modal as an Array
		$school = SchoolDetails::find()->where(['id'=>$id])->asArray()->one();



		$schoolArray['details']= $school;
		$schoolArray['address'] = $schoolDetails->getAddressesAsArray();
		$schoolArray['cca'] = $schoolDetails->getCCasAsArray();
		$schoolArray['infra'] = $schoolDetails->getInfrasAsArray();
		$schoolArray['levels'] = $schoolDetails->getLevelsAsArray();
		$schoolArray['syllabus'] = $schoolDetails->getSyllabiAsArray();

		return array('status'=>true,'data'=> $schoolArray);

	}

	public function actionGetSchoolByName($name){
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

		$schoolDetails = SchoolDetails::find()->select(['name'])->where(['LIKE', 'name', $name.'%', false])->asArray()->all();

		return array('status'=>true,'data'=> $schoolDetails);
	}

	public function actionGetSchoolByCity($city){
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

		$schoolDetails = SchoolDetails::find()->leftJoin('schooldetails_address', '`schooldetails_address`.`school_details_id` = `school_details`.`id`')->select(['name'])->where(['LIKE', 'city', $city.'%', false])->asArray()->all();   

		return array('status'=>true,'data'=> $schoolDetails);
	}

	public function actionGetSchoolByPincode($pincode){
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

		$schoolDetails = SchoolDetails::find()->leftJoin('schooldetails_address', '`schooldetails_address`.`school_details_id` = `school_details`.`id`')->select(['name'])->where(['LIKE', 'Pincode', $pincode.'%', false])->asArray()->all();   

		return array('status'=>true,'data'=> $schoolDetails);
	}

}