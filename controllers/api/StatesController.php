<?php

namespace app\controllers\api;

use Yii;
use app\models\States;
use app\models\StatesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class StatesController extends Controller
{
    public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
    }

	public function actionGetStates()
    {

        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $state = States::find()->all();

        if(count($state) > 0 )

        {

        return array('status' => true, 'data'=> $state);

        }

        else

        {

        return array('status'=>false,'data'=> 'No state Found');

        }

    }


    public function actionCreateState(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $state = new States();
        $state->scenario = States:: SCENARIO_CREATE;
        $state->attributes = \yii::$app->request->post();
        if($state->validate()) {
            $state->save();
            return array('status' => true, 'data'=> 'state record is successfully updated');
        }else
        {
            return array('status'=>false,'data'=>$state->getErrors());
        }
    }

}