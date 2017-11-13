<?php

namespace app\controllers;

use Yii;
use app\models\SchoolDetails;
use app\models\SchooldetailsAddress;
use app\models\SchooldetailsAddressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SchooldetailsAddressController implements the CRUD actions for SchooldetailsAddress model.
 */
class SchooldetailsAddressController extends Controller
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
     * Lists all SchooldetailsAddress models.
     * @return mixed
     */
    public function actionIndex($school_details_id)
    {
        $searchModel = new SchooldetailsAddressSearch();
         $searchModel->school_details_id = $school_details_id;
        $dataProvider = $searchModel->search([]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'school_details_id'=>$school_details_id,
        ]);
    }

    /**
     * Displays a single SchooldetailsAddress model.
     * @param integer $id
     * @param integer $school_details_id
     * @return mixed
     */
    public function actionView($id, $school_details_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $school_details_id),
        ]);
    }

    /**
     * Creates a new SchooldetailsAddress model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($school_details_id)
    {
        



        if (Yii::$app->request->post()) {
             $postData = Yii::$app->request->post();
                $model = new SchooldetailsAddress();
             if (!$model::findOne(['school_details_id' => $school_details_id])) 
             { 
                
                $model->Address_Line_1=$postData['SchooldetailsAddress']['Address_Line_1'];
                $model->Address_Line_2=$postData['SchooldetailsAddress']['Address_Line_2'];
                $model->Landline_Number=(int)$postData['SchooldetailsAddress']['Landline_Number'];
            $model->Alternative_Landline_Number=(int)$postData['SchooldetailsAddress']['Alternative_Landline_Number'];
                $model->Cell_Number=(int)$postData['SchooldetailsAddress']['Cell_Number'];
                $model->Alternative_Cell_Number=(int)$postData['SchooldetailsAddress']['Alternative_Cell_Number'];
                $model->Pincode=(int)$postData['SchooldetailsAddress']['Pincode'];
                $model->City=$postData['SchooldetailsAddress']['City'];
                $model->State=$postData['SchooldetailsAddress']['State'];
                //var_dump($model);
                //exit();
                $model->school_details_id = $school_details_id;
                $model->save();
              }
            return $this->redirect(['index', 'id' => $model->id, 'school_details_id' => $school_details_id]);
        } else {

            $model= new SchooldetailsAddress();
            $schoolDetails = SchoolDetails::findOne($school_details_id);
            return $this->render('create', [
                'model' => $model,
                 'schoolName'=> $schoolDetails->name
            ]);
        }
    }

    /**
     * Updates an existing SchooldetailsAddress model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $school_details_id
     * @return mixed
     */
    public function actionUpdate($id, $school_details_id)
    {
        $model = $this->findModel($id, $school_details_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'school_details_id' => $model->school_details_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SchooldetailsAddress model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $school_details_id
     * @return mixed
     */
    public function actionDelete($id, $school_details_id)
    {
        $this->findModel($id, $school_details_id)->delete();

        return $this->redirect(['index', 'school_details_id' => $school_details_id]);
    }

    /**
     * Finds the SchooldetailsAddress model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $school_details_id
     * @return SchooldetailsAddress the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $school_details_id)
    {
        if (($model = SchooldetailsAddress::findOne(['id' => $id, 'school_details_id' => $school_details_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
