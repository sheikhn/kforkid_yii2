<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsAddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schooldetails-address-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'school_details_id') ?>

    <?= $form->field($model, 'Address_Line_1') ?>

    <?= $form->field($model, 'Address_Line_2') ?>

    <?= $form->field($model, 'Landline_Number') ?>

    <?php // echo $form->field($model, 'Alternative_Landline_Number') ?>

    <?php // echo $form->field($model, 'Cell_Number') ?>

    <?php // echo $form->field($model, 'Alternative_Cell_Number') ?>

    <?php // echo $form->field($model, 'Pincode') ?>

    <?php // echo $form->field($model, 'City') ?>

    <?php // echo $form->field($model, 'State') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
