<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\SchoolDetails;
use app\models\SchoolCca;
/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsCca */
/* @var $form yii\widgets\ActiveForm */

$schoolList = ArrayHelper::map(SchoolDetails::find()->all(), 'id', 'name');
$schoolCcaList = ArrayHelper::map(SchoolCca::find()->all(), 'id', 'name');
?>

<div class="schooldetails-cca-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'school_cca_id')->checkboxList($schoolCcaList); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
