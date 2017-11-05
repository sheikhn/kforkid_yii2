<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsCca */

$this->title = 'Update Schooldetails Cca: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schooldetails Ccas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'school_details_id' => $model->school_details_id, 'school_cca_id' => $model->school_cca_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schooldetails-cca-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
