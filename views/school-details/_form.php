<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SchoolDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="school-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact')->textInput() ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'studentratio')->textInput() ?>

    <?= $form->field($model, 'teacherratio')->textInput() ?>

    <?= $form->field($model, 'classroom')->textInput() ?>

    <?= $form->field($model, 'totalstudents')->textInput() ?>

    <?= $form->field($model, 'playgroundsize')->textInput() ?>

    <?= $form->field($model, 'campussize')->textInput() ?>

    <?= $form->field($model, 'sslcfirstclass')->textInput() ?>

    <?= $form->field($model, 'studentmaleratio')->textInput() ?>

    <?= $form->field($model, 'studentfemaleratio')->textInput() ?>

    <?= $form->field($model, 'teachermaleratio')->textInput() ?>

    <?= $form->field($model, 'teacherfemaleratio')->textInput() ?>

    <?= $form->field($model, 'minoritystudents')->textInput() ?>

    <?= $form->field($model, 'avgyearlycost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
