<?php

namespace app\controllers\api;

use Yii;
use app\models\SchoolLevel;
use app\models\SchoollevelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class LevelController extends Controller
{
	public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
    }

    public function actionGetLevels()
    {

        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $level = SchoolLevel::find()->all();

        if(count($level) > 0 )

        {

        return array('status' => true, 'data'=> $level);

        }

        else

        {

        return array('status'=>false,'data'=> 'No School levels Found');
        }

    }

    public function actionCreateLevels(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $level = new SchoolLevel();
        $level->scenario = SchoolLevel:: SCENARIO_CREATE;
        $level->attributes = \yii::$app->request->post();
        if($level->validate()) {
            $level->save();
            return array('status' => true, 'data'=> 'Scholl level record is successfully updated');
        }else
        {
            return array('status'=>false,'data'=>$level->getErrors());
        }
    }


}

