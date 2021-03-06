<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsInfra */

$this->title = 'Update Schooldetails Infra: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schooldetails Infras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'school_details_id' => $model->school_details_id, 'school_infra_id' => $model->school_infra_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schooldetails-infra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
