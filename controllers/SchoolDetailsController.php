<?php

namespace app\controllers;

use Yii;
use app\models\SchoolDetails;
use app\models\SchooldetailsCca;
use app\models\SchooldetailsInfra;
use app\models\SchooldetailsLevel;
use app\models\SchooldetailsSyllabus;
use app\models\SchooldetailsAddress;



use app\models\SchooldetailsCcaSearch;
use app\models\SchooldetailsInfraSearch;
use app\models\SchooldetailsLevelSearch;
use app\models\SchooldetailsSyllabusSearch;
use app\models\SchooldetailsAddressSearch;
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

        $addressSearchModel = new SchooldetailsAddressSearch();
        $addressSearchModel->school_details_id = $id;
        $addressDataProvider = $addressSearchModel->search([]);

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
            'addressSearchModel'=>$addressSearchModel,
            'addressDataProvider'=>$addressDataProvider,
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
        $modellevel = new SchooldetailsLevel();
        $modelcca = new SchooldetailsCca();
        $modelinfra = new SchooldetailsInfra();
        $modelsyllabus = new SchooldetailsSyllabus();
        $modeladdress = new SchooldetailsAddress();


        if (Yii::$app->request->post()) {

        $transaction = Yii::$app->db->beginTransaction();

         if ($model->load(Yii::$app->request->post()) && $modellevel->load(Yii::$app->request->post())
             && $modelcca->load(Yii::$app->request->post()) && $modelinfra->load(Yii::$app->request->post())
             && $modelsyllabus->load(Yii::$app->request->post()) && $modeladdress->load(Yii::$app->request->post())) {


                   try  {

                           $model->save();
                           $modellevel->school_details_id = $model->id;
                           $modelcca->school_details_id = $model->id;
                           $modelinfra->school_details_id = $model->id;
                           $modelsyllabus->school_details_id = $model->id;
                           $modeladdress->school_details_id = $model->id;

                           $school_details_id = $model->id;

                           SchooldetailsLevel::saveFromPost($school_details_id, Yii::$app->request->post());
                           SchooldetailsCca::saveFromPost($school_details_id, Yii::$app->request->post());
                           SchooldetailsInfra::saveFromPost($school_details_id, Yii::$app->request->post());
                           SchooldetailsSyllabus::saveFromPost($school_details_id, Yii::$app->request->post());
                           SchooldetailsAddress::saveFromPost($school_details_id,Yii::$app->request->post());

                           $transaction->commit();


                   } catch (Exception $e) {
                       $transaction->rollBack();
                   }
         } else {
             $transaction->rollBack();
         }

         return $this->redirect(['view', 'id' => $model->id ]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modellevel' => $modellevel,
                'modelcca' => $modelcca,
                'modelinfra' => $modelinfra,
                'modelsyllabus' => $modelsyllabus,
                'modeladdress' => $modeladdress,
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
        //empty models form
        $modellevel = new SchooldetailsLevel();
        $modelcca = new SchooldetailsCca();
        $modelinfra = new SchooldetailsInfra();
        $modelsyllabus = new SchooldetailsSyllabus();
        $modeladdress = $model->schooldetailsAddress;


        //Filling the empty model with db data to auto fill the form
        $schoolLevelsArray = [];

        foreach ($model->schooldetailsLevels as $schoolLevel) {
            array_push($schoolLevelsArray, $schoolLevel->school_level_id);
        }
        $modellevel->school_level_id = $schoolLevelsArray;

        $schoolCcasArray = [];

        foreach ($model->schooldetailsCcas as $schoolCca) {
            array_push($schoolCcasArray, $schoolCca->school_cca_id);
        }
        $modelcca->school_cca_id = $schoolCcasArray;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/schooldetails-cca/index', 'school_details_id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modellevel' => $modellevel,
                'modelcca' => $modelcca,
                'modelinfra' => $modelinfra,
                'modelsyllabus' => $modelsyllabus,
                'modeladdress' => $modeladdress,
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
        $modal = $this->findModel($id);

        $ccas = $modal->schooldetailsCcas;
        $addresses = $modal->schooldetailsAddresses;
        $infras = $modal->schooldetailsInfras;
        $levels = $modal->schooldetailsLevels;
        $syllabi = $modal->schooldetailsSyllabi;

        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();
        try {
                //cca delete
                foreach ($ccas as $cca) {
                    $cca->delete();
                }

                //address delete
                foreach ($addresses as $address) {
                    $address->delete();
                 }

                 //infras delete
                 foreach ($infras as $infra) {
                      $infra->delete();
                 }

               //levels delete
                foreach ($levels as $level) {
                    $level->delete();
                 }

                //syllabi delete
               foreach ($syllabi as $syllabus) {
                    $syllabus->delete();
                }


                $modal->delete();

                $transaction->commit();
        } catch(\Exception $e) {
                $transaction->rollBack();
                throw $e;
        }


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
