<?php

namespace app\controllers;

use Yii;
use app\models\SchoolDetails;
use app\models\SchooldetailsCca;
use app\models\SchooldetailsCcaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SchooldetailsCcaController implements the CRUD actions for SchooldetailsCca model.
 */
class SchooldetailsCcaController extends Controller
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
     * Lists all SchooldetailsCca models.
     * @return mixed
     */
    public function actionIndex($school_details_id)
    {
        $searchModel = new SchooldetailsCcaSearch();
        $searchModel->school_details_id = $school_details_id;

        $dataProvider = $searchModel->search([]);
        $schoolDetails = SchoolDetails::findOne($school_details_id);

        //var_dump(Yii::$app->request->queryParams)

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'school_details_id' => $school_details_id,
             'schoolName'=> $schoolDetails->name
        ]);
    }

    /**
     * Displays a single SchooldetailsCca model.
     * @param integer $id
     * @param integer $school_details_id
     * @param integer $school_cca_id
     * @return mixed
     */
    public function actionView($id, $school_details_id, $school_cca_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $school_details_id, $school_cca_id),
        ]);
    }

    /**
     * Creates a new SchooldetailsCca model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($school_details_id)
    {
        

        if (Yii::$app->request->post()) {
            $postData = Yii::$app->request->post();


            foreach ($postData['SchooldetailsCca']['school_cca_id'] as $key => $value) {
                

                $model = new SchooldetailsCca();
                //checking if already exists
                if (!$model::findOne(['school_details_id' => $school_details_id, 'school_cca_id' => (int)$value])) {

                    $model->school_details_id = $school_details_id;
                    $model->school_cca_id = (int)$value;
                    $id=$model->save();

                }
            }

            $schoolDetails = SchoolDetails::findOne($school_details_id);

             return $this->redirect(['index', 'id' => $model->id, 'school_details_id' => $school_details_id]);
            
        } else {
    
             $model = new SchooldetailsCca();
             $schoolDetails = SchoolDetails::findOne($school_details_id);
            return $this->render('create', [
                'model' => $model,
                'schoolName'=> $schoolDetails->name
            ]);
        }
    }           

    /**
     * Updates an existing SchooldetailsCca model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $school_details_id
     * @param integer $school_cca_id
     * @return mixed
     */
    public function actionUpdate($id, $school_details_id, $school_cca_id)
    {
        $model = $this->findModel($id, $school_details_id, $school_cca_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'school_details_id' => $model->school_details_id, 'school_cca_id' => $model->school_cca_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SchooldetailsCca model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $school_details_id
     * @param integer $school_cca_id
     * @return mixed
     */
    public function actionDelete($id, $school_details_id, $school_cca_id)
    {
        $this->findModel($id, $school_details_id, $school_cca_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SchooldetailsCca model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $school_details_id
     * @param integer $school_cca_id
     * @return SchooldetailsCca the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $school_details_id, $school_cca_id)
    {
        if (($model = SchooldetailsCca::findOne(['id' => $id, 'school_details_id' => $school_details_id, 'school_cca_id' => $school_cca_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
