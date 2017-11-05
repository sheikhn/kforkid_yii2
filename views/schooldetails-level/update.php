<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsLevel */

$this->title = 'Update Schooldetails Level: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schooldetails Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'school_details_id' => $model->school_details_id, 'school_level_id' => $model->school_level_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schooldetails-level-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
