<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\SchoolDetails;
use app\models\SchoolSyllabus;

/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsSyllabus */
/* @var $form yii\widgets\ActiveForm */

$schoolList = ArrayHelper::map(SchoolDetails::find()->all(), 'id', 'name');
$schoolSyllabusList = ArrayHelper::map(SchoolSyllabus::find()->all(), 'id', 'syllabus');
?>

<div class="schooldetails-syllabus-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'school_syllabus_id')->checkboxList($schoolSyllabusList); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Next' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
