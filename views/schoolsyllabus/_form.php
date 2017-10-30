<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SchoolSyllabus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="school-syllabus-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'syllabus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
