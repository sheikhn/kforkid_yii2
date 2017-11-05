<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsSyllabus */

$this->title = 'Update Schooldetails Syllabus: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schooldetails Syllabi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'school_details_id' => $model->school_details_id, 'school_syllabus_id' => $model->school_syllabus_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schooldetails-syllabus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
