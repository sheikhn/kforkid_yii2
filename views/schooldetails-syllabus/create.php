<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsSyllabus */

$this->title = $schoolName;
$this->params['breadcrumbs'][] = ['label' => 'Schooldetails Syllabi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-syllabus-create">

    <h1><?= Html::encode(strtoupper($this->title)) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
