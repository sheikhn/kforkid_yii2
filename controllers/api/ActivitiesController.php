<?php

namespace app\controllers\api;

use Yii;
use app\models\SchoolCca;
use app\models\SchoolCcaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ActivitiesController extends Controller
{
	public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
    }

    public function actionGetActivities()
    {

        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $activities = SchoolCca::find()->all();

        if(count($activities) > 0 )

        {

        return array('status' => true, 'data'=> $activities);

        }

        else

        {

        return array('status'=>false,'data'=> 'No School Activities Found');
        }

    }

    public function actionCreateActivities(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $activities = new SchoolCca();
        $activities->scenario = SchoolCca:: SCENARIO_CREATE;
        $activities->attributes = \yii::$app->request->post();
        if($activities->validate()) {
            $activities->save();
            return array('status' => true, 'data'=> 'School Activities record is successfully updated');
        }else
        {
            return array('status'=>false,'data'=>$activities->getErrors());
        }
    }


}

