<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsAddress */

$this->title = 'Update Schooldetails Address: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schooldetails Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'school_details_id' => $model->school_details_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schooldetails-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
