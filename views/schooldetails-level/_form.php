<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\SchoolDetails;
use app\models\SchoolLevel;

/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsLevel */
/* @var $form yii\widgets\ActiveForm */

$schoolDetails = ArrayHelper::map(SchoolDetails::find()->all(), 'id', 'name');
$schoolLevels = ArrayHelper::map(SchoolLevel::find()->all(), 'id', 'level');

?>

<div class="schooldetails-level-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'school_level_id')->checkboxList($schoolLevels); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Next' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
