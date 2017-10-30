<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SchoolDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="school-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'contact') ?>

    <?= $form->field($model, 'school_infra_id') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'school_level_id') ?>

    <?php // echo $form->field($model, 'school_syllabus_id') ?>

    <?php // echo $form->field($model, 'studentratio') ?>

    <?php // echo $form->field($model, 'teacherratio') ?>

    <?php // echo $form->field($model, 'classroom') ?>

    <?php // echo $form->field($model, 'totalstudents') ?>

    <?php // echo $form->field($model, 'playgroundsize') ?>

    <?php // echo $form->field($model, 'campussize') ?>

    <?php // echo $form->field($model, 'sslcfirstclass') ?>

    <?php // echo $form->field($model, 'studentmaleratio') ?>

    <?php // echo $form->field($model, 'studentfemaleratio') ?>

    <?php // echo $form->field($model, 'teachermaleratio') ?>

    <?php // echo $form->field($model, 'teacherfemaleratio') ?>

    <?php // echo $form->field($model, 'minoritystudents') ?>

    <?php // echo $form->field($model, 'school_cca_id') ?>

    <?php // echo $form->field($model, 'avgyearlycost') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
