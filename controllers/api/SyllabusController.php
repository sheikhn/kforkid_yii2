<?php
namespace app\controllers\api;

use Yii;
use app\models\SchoolSyllabus;
use app\models\SchoolsyllabusSearch;
//use app\controllers\SchoolsyllabusController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class SyllabusController extends Controller
{
 	public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
	}

	public function actionGetSyllabus()
    {

        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $syllabus = SchoolSyllabus::find()->all();

        if(count($syllabus) > 0 )

        {

        return array('status' => true, 'data'=> $syllabus);

        }

        else

        {

        return array('status'=>false,'data'=> 'No syllabus Found');

        }

    }

    public function actionCreateSyllabus(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $syllabus = new SchoolSyllabus();
        $syllabus->scenario = SchoolSyllabus:: SCENARIO_CREATE;
        $syllabus->attributes = \yii::$app->request->post();
        if($syllabus->validate()) {
            $syllabus->save();
            return array('status' => true, 'data'=> 'syllabus record is successfully updated');
        }else
        {
            return array('status'=>false,'data'=>$syllabus->getErrors());
        }
    }


}
