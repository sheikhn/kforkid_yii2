<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SchoolDetails */

$this->title = 'Fill Up The Following School Details';
$this->params['breadcrumbs'][] = ['label' => 'School Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-details-create">

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


