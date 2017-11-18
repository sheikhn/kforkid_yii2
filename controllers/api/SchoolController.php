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
        $schoolsQuery = SchoolDetails::find();
        //use Filter params in where conditions
        $getParams = Yii::$app->request->get();
        //If there are any query params, i.e filters
        if (sizeof($getParams)) {
            if (array_key_exists('cca', $getParams)) {
               $schoolsQuery->leftJoin('schooldetails_cca', '`schooldetails_cca`.`school_details_id` = `school_details`.`id`');
               $schoolsQuery->andWhere(['schooldetails_cca.school_cca_id' => $getParams['cca']]);

            }
            if (array_key_exists('level', $getParams)) {
               $schoolsQuery->leftJoin('schooldetails_level', '`schooldetails_level`.`school_details_id` = `school_details`.`id`');
               $schoolsQuery->andWhere(['schooldetails_level.school_level_id' => $getParams['level']]);
            }
            if (array_key_exists('syllabus', $getParams)) {
               $schoolsQuery->leftJoin('schooldetails_syllabus', '`schooldetails_syllabus`.`school_details_id` = `school_details`.`id`');
               $schoolsQuery->andWhere(['schooldetails_syllabus.school_syllabus_id' => $getParams['syllabus']]);
            }
            if (array_key_exists('infra', $getParams)) {
               $schoolsQuery->leftJoin('schooldetails_infra', '`schooldetails_infra`.`school_details_id` = `school_details`.`id`');
               $schoolsQuery->andWhere(['schooldetails_infra.school_infra_id' => $getParams['infra']]);

            }
        }
        //var_dump($schoolsQuery);
        $schools = $schoolsQuery->asArray()->all();
        //$schools contains the array of all schools details. array of arrays

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

        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

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


}