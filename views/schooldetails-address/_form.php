<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schooldetails-address-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'Address_Line_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address_Line_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Landline_Number')->textInput() ?>

    <?= $form->field($model, 'Alternative_Landline_Number')->textInput() ?>

    <?= $form->field($model, 'Cell_Number')->textInput() ?>

    <?= $form->field($model, 'Alternative_Cell_Number')->textInput() ?>

    <?= $form->field($model, 'Pincode')->textInput() ?>

    <?= $form->field($model, 'City')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'State')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
