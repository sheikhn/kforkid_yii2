<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SchoolDetails */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'School Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'address',
            'contact',
            'school_infra_id',
            'rating',
            'school_level_id',
            'school_syllabus_id',
            'studentratio',
            'teacherratio',
            'classroom',
            'totalstudents',
            'playgroundsize',
            'campussize',
            'sslcfirstclass',
            'studentmaleratio',
            'studentfemaleratio',
            'teachermaleratio',
            'teacherfemaleratio',
            'minoritystudents',
            'school_cca_id',
            'avgyearlycost',
        ],
    ]) ?>

</div>
