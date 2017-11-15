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

        $schoolList= [];
        //Get all schools as Array
        $schools = SchoolDetails::find()->asArray()->all();
        //$schools contains the array of all schools details. array of arrays

        foreach ($schools as $school){
            //$school is the array of once school
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
            var_dump($schoolList);
            exit();
        }


        return array('status'=>true,'data'=> $schoolList);

    }

     public function actionGetSchool($id)
    {   
        

        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $schoolList= [];
        //Get all schools as Array
        $schoolDetails = SchoolDetails::find()->where(['id'=>$id])->one();
        //$schools contains the array of all schools details. array of arrays
        
        
        $schools['details']=SchoolDetails::find()->asArray()->one();
        $schools['address'] = $schoolDetails->getAddressesAsArray();
            $schools['cca'] = $schoolDetails->getCCasAsArray();
            $schools['infra'] = $schoolDetails->getInfrasAsArray();
            $schools['levels'] = $schoolDetails->getLevelsAsArray();
            $schools['syllabus'] = $schoolDetails->getSyllabiAsArray();
            array_push($schoolList, $schools);

        return array('status'=>true,'data'=> $schoolList);

    }


}