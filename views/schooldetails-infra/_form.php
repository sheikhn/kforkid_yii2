<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\SchoolDetails;
use app\models\SchoolInfra;


/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsInfra */
/* @var $form yii\widgets\ActiveForm */

$schoolList = ArrayHelper::map(SchoolDetails::find()->all(), 'id', 'name');
$schoolInfraList = ArrayHelper::map(SchoolInfra::find()->all(), 'id', 'name');

?>

<div class="schooldetails-infra-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'school_infra_id')->checkboxList($schoolInfraList); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
