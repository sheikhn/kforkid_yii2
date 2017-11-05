<?php

namespace app\controllers;

use Yii;
use app\models\SchoolDetails;
use app\models\SchooldetailsCcaSearch;
use app\models\SchooldetailsInfraSearch;
use app\models\SchooldetailsLevelSearch;
use app\models\SchooldetailsSyllabusSearch;

use app\models\SchoolDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SchoolDetailsController implements the CRUD actions for SchoolDetails model.
 */
class SchoolDetailsController extends Controller
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
     * Lists all SchoolDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchoolDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SchoolDetails model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
         $ccaSearchModel = new SchooldetailsCcaSearch();
        $ccaSearchModel->school_details_id = $id;
        $ccaDataProvider = $ccaSearchModel->search([]);

        $infraSearchModel = new SchooldetailsInfraSearch();
        $infraSearchModel->school_details_id = $id;
        $infraDataProvider = $infraSearchModel->search([]);

         $levelSearchModel = new SchooldetailsLevelSearch();
        $levelSearchModel->school_details_id = $id;
        $levelDataProvider = $levelSearchModel->search([]);

         $syllabusSearchModel = new SchooldetailsSyllabusSearch();
        $syllabusSearchModel->school_details_id = $id;
        $syllabusDataProvider = $syllabusSearchModel->search([]);


        return $this->render('view', [
            'model' => $this->findModel($id),
             'ccaSearchModel' => $ccaSearchModel,
            'ccaDataProvider' => $ccaDataProvider,
            'infraSearchModel' => $infraSearchModel,
            'infraDataProvider' => $infraDataProvider,
            'levelSearchModel' => $levelSearchModel,
            'levelDataProvider' => $levelDataProvider,
            'syllabusSearchModel' => $syllabusSearchModel,
            'syllabusDataProvider' => $syllabusDataProvider,
        ]);
    }

    /**
     * Creates a new SchoolDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SchoolDetails();
            
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['/schooldetails-level/create', 'school_details_id' => $model->id ]);
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SchoolDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/schooldetails-level/index', 'school_details_id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SchoolDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SchoolDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SchoolDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SchoolDetails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
