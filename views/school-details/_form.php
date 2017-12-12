<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\SchoolLevel;
use app\models\SchoolCca;
use app\models\SchoolInfra;
use app\models\SchoolSyllabus;

/* @var $this yii\web\View */
/* @var $model app\models\SchoolDetails */
/* @var $form yii\widgets\ActiveForm */

$schoolLevels = ArrayHelper::map(SchoolLevel::find()->all(), 'id', 'level');
$schoolCcaList = ArrayHelper::map(SchoolCca::find()->all(), 'id', 'name');
$schoolInfraList = ArrayHelper::map(SchoolInfra::find()->all(), 'id', 'name');
$schoolSyllabusList = ArrayHelper::map(SchoolSyllabus::find()->all(), 'id', 'syllabus');


?>



<div class="school-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'teacherratio')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'studentratio')->textInput() ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'rating')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'classroom')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'totalstudents')->textInput() ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'playgroundsize')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'campussize')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'sslcfirstclass')->textInput() ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'studentmaleratio')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'studentfemaleratio')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'teachermaleratio')->textInput() ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'teacherfemaleratio')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'minoritystudents')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'avgyearlycost')->textInput() ?>
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Next' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="schooldetails-level-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($modellevel, 'school_level_id')->checkboxList($schoolLevels); ?>

    <div class="form-group">
        <?= Html::submitButton($modellevel->isNewRecord ? 'Next' : 'Update', ['class' => $modellevel->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="schooldetails-cca-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelcca, 'school_cca_id')->checkboxList($schoolCcaList); ?>


    <div class="form-group">
        <?= Html::submitButton($modelcca->isNewRecord ? 'Add' : 'Update', ['class' => $modelcca->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="schooldetails-infra-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($modelinfra, 'school_infra_id')->checkboxList($schoolInfraList); ?>


    <div class="form-group">
        <?= Html::submitButton($modelinfra->isNewRecord ? 'Add' : 'Update', ['class' => $modelinfra->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="schooldetails-syllabus-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($modelsyllabus, 'school_syllabus_id')->checkboxList($schoolSyllabusList); ?>

    <div class="form-group">
        <?= Html::submitButton($modelsyllabus->isNewRecord ? 'Next' : 'Update', ['class' => $modelsyllabus->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="schooldetails-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    <div class="col-md-6">
    <?= $form->field($modeladdress, 'Address_Line_1')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($modeladdress, 'Address_Line_2')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <?= $form->field($modeladdress, 'Landline_Number')->textInput() ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($modeladdress, 'Alternative_Landline_Number')->textInput() ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <?= $form->field($modeladdress, 'Cell_Number')->textInput() ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($modeladdress, 'Alternative_Cell_Number')->textInput() ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <?= $form->field($modeladdress, 'Pincode')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($modeladdress, 'City')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($modeladdress, 'State')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($modeladdress->isNewRecord ? 'Create' : 'Update', ['class' => $modeladdress->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
