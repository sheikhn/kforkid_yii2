<?php

namespace app\controllers;

use Yii;
use app\models\SchoolDetails;
use app\models\SchooldetailsInfra;
use app\models\SchooldetailsInfraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SchooldetailsInfraController implements the CRUD actions for SchooldetailsInfra model.
 */
class SchooldetailsInfraController extends Controller
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
     * Lists all SchooldetailsInfra models.
     * @return mixed
     */
    public function actionIndex($school_details_id)
    {
        $searchModel = new SchooldetailsInfraSearch();
        $searchModel->school_details_id = $school_details_id;
        $dataProvider = $searchModel->search([]);
        $schoolDetails = SchoolDetails::findOne($school_details_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'school_details_id' => $school_details_id,
            'schoolName'=> $schoolDetails->name
        ]);
    }

    /**
     * Displays a single SchooldetailsInfra model.
     * @param integer $id
     * @param integer $school_details_id
     * @param integer $school_infra_id
     * @return mixed
     */
    public function actionView($id, $school_details_id, $school_infra_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $school_details_id, $school_infra_id),
        ]);
    }

    /**
     * Creates a new SchooldetailsInfra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($school_details_id)
    {
        
        if (Yii::$app->request->post()) {
            $postData = Yii::$app->request->post();

            foreach ($postData['SchooldetailsInfra']['school_infra_id'] as $key => $value) {
                
                $model = new SchooldetailsInfra();
                //checking if already exists
                if (!$model::findOne(['school_details_id' => $school_details_id, 'school_infra_id' => (int)$value])) {
                    $model->school_details_id = $school_details_id;
                    $model->school_infra_id = (int)$value;
                    $model->save();
                }
            }
            return $this->redirect(['index', 'id' => $model->id, 'school_details_id' => $school_details_id]);
        } else {
            $model = new SchooldetailsInfra();
            $schoolDetails = SchoolDetails::findOne($school_details_id);
            return $this->render('create', [
                'model' => $model,
                'schoolName'=> $schoolDetails->name
            ]);
        }
    }

    /**
     * Updates an existing SchooldetailsInfra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $school_details_id
     * @param integer $school_infra_id
     * @return mixed
     */
   

    /**
     * Deletes an existing SchooldetailsInfra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $school_details_id
     * @param integer $school_infra_id
     * @return mixed
     */
    public function actionDelete($id, $school_details_id, $school_infra_id)
    {
        $this->findModel($id, $school_details_id, $school_infra_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SchooldetailsInfra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $school_details_id
     * @param integer $school_infra_id
     * @return SchooldetailsInfra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $school_details_id, $school_infra_id)
    {
        if (($model = SchooldetailsInfra::findOne(['id' => $id, 'school_details_id' => $school_details_id, 'school_infra_id' => $school_infra_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
