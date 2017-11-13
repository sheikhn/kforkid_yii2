<?php

namespace app\controllers\api;

use Yii;
use app\models\SchoolDetails;
use app\models\SchoolDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class SchooldetailsController extends Controller
{
	public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
    }

    public function actionGetSchools()
    {

        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $schooldetails = SchoolDetails::find()
				-> leftJoin('schooldetails_syllabus', 'schooldetails_syllabus.school_details_id=school_details.id')
				-> leftJoin('schooldetails_level', 'schooldetails_level.school_details_id=school_details.id')
				-> leftJoin('schooldetails_infra', 'schooldetails_infra.school_details_id=school_details.id')
				-> leftJoin('schooldetails_cca', 'schooldetails_cca.school_details_id=school_details.id')
				-> leftJoin('schooldetails_address', 'schooldetails_address.school_details_id=school_details.id')
			    ->all();



					 /*->where(['is', 'availability.ID', NULL])*/
					 


		/*$query->select('report_details.reference_no, report_details.subject, 
                          report_details.doc_for, report_details.doc_from, 
                          report_details.doc_date, report_details.doc_name, 
                          report_details.drawer_id, report_details.user_id,
                          name.name_id, name.position, name.fname, name.mname, name.lname')
                ->from('report_details')
                ->leftJoin( 'name', 'report_details.doc_for = name.name_id');*/
                /*->where(['report_details.reference_no' => $model->reference_no]);*/


        /*$schooldetails = SchoolDetails::find()->all();*/

        if(count($schooldetails) > 0 )

        {

        return array('status' => true, 'data'=> $schooldetails);

        }

        else

        {

        return array('status'=>false,'data'=> 'No School Details Found');
        }

    }

}