<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schooldetails-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'Address_Line_1')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'Address_Line_2')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'Landline_Number')->textInput() ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'Alternative_Landline_Number')->textInput() ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'Cell_Number')->textInput() ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'Alternative_Cell_Number')->textInput() ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'Pincode')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'City')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'State')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
