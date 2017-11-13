<?php

namespace app\controllers\api;

use Yii;
use app\models\SchoolInfra;
use app\models\SchoolInfraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class InfrastructureController extends Controller
{
	public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
    }

    public function actionGetInfrastructure()
    {

        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $infra = SchoolInfra::find()->all();

        if(count($infra) > 0 )

        {

        return array('status' => true, 'data'=> $infra);

        }

        else

        {

        return array('status'=>false,'data'=> 'No School Infrastructure Found');
        }

    }

    public function actionCreateInfrastructure(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $infra = new SchoolInfra();
        $infra->scenario = SchoolInfra:: SCENARIO_CREATE;
        $infra->attributes = \yii::$app->request->post();
        if($infra->validate()) {
            $infra->save();
            return array('status' => true, 'data'=> 'School Infrastructure record is successfully updated');
        }else
        {
            return array('status'=>false,'data'=>$infra->getErrors());
        }
    }


}

