<?php

namespace app\controllers;

use Yii;
use app\models\SchoolDetails;
use app\models\SchooldetailsLevel;
use app\models\SchooldetailsLevelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SchooldetailsLevelController implements the CRUD actions for SchooldetailsLevel model.
 */
class SchooldetailsLevelController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SchooldetailsLevel models.
     * @return mixed
     */
    public function actionIndex($school_details_id)
    {
        $searchModel = new SchooldetailsLevelSearch();
        $searchModel->school_details_id = $school_details_id;
        $dataProvider = $searchModel->search([]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'school_details_id' => $school_details_id
        ]);
    }

    /**
     * Displays a single SchooldetailsLevel model.
     * @param integer $id
     * @param integer $school_details_id
     * @param integer $school_level_id
     * @return mixed
     */
    public function actionView($id, $school_details_id, $school_level_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $school_details_id, $school_level_id),
        ]);
    }

    /**
     * Creates a new SchooldetailsLevel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($school_details_id)
    {
    
        if (Yii::$app->request->post()) {
            $postData = Yii::$app->request->post();
            //var_dump($postData['SchooldetailsLevel']);
            foreach ($postData['SchooldetailsLevel']['school_level_id'] as $key => $value) {
                
                $model = new SchooldetailsLevel();

                if (!$model::findOne(['school_details_id' => $school_details_id, 'school_level_id' => (int)$value])) {
                $model->school_details_id = $school_details_id;
                $model->school_level_id = (int)$value;
                $model->save();
                }
            }

            return $this->redirect(['index', 'id' => $model->id, 'school_details_id' => $school_details_id]);
        } else {
            $model = new SchooldetailsLevel();
            $schoolDetails = SchoolDetails::findOne($school_details_id);
            return $this->render('create', [
                'model' => $model,
                'schoolName'=> $schoolDetails->name
            ]);
        }
    }


    /**
     * Deletes an existing SchooldetailsLevel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $school_details_id
     * @param integer $school_level_id
     * @return mixed
     */
    public function actionDelete($id, $school_details_id, $school_level_id)
    {
        $this->findModel($id, $school_details_id, $school_level_id)->delete();

        return $this->redirect(['index', 'school_details_id' => $school_details_id]);
    }

    /**
     * Finds the SchooldetailsLevel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $school_details_id
     * @param integer $school_level_id
     * @return SchooldetailsLevel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $school_details_id, $school_level_id)
    {
        if (($model = SchooldetailsLevel::findOne(['id' => $id, 'school_details_id' => $school_details_id, 'school_level_id' => $school_level_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModels($school_details_id)
    {
        if (($models = SchooldetailsLevel::find(['school_details_id' => $school_details_id])->all()) !== null) {
            return $models;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
