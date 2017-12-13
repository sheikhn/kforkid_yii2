<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SchoolDetails */

$this->title = 'Update School Details: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'School Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="school-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modellevel' => $modellevel,
        'modelcca' => $modelcca,
        'modelinfra' => $modelinfra,
        'modelsyllabus' => $modelsyllabus,
        'modeladdress' => $modeladdress,
    ]) ?>

</div>
