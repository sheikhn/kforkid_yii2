<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SchoolSyllabus */

$this->title = 'Create School Syllabus';
$this->params['breadcrumbs'][] = ['label' => 'School Syllabi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-syllabus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
