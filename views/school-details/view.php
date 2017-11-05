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
            'rating',
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
            'avgyearlycost',
        ],
    ]) ?>

    <?= Yii::$app->controller->renderPartial('/schooldetails-cca/index',['school_details_id' => $model->id,'dataProvider'=>$ccaDataProvider,'searchModel'=>$ccaSearchModel,'isDetailView'=>true]); ?>

    <?= Yii::$app->controller->renderPartial('/schooldetails-level/index',['school_details_id' => $model->id,'dataProvider'=>$levelDataProvider,'searchModel'=>$levelSearchModel]); ?>
    <?= Yii::$app->controller->renderPartial('/schooldetails-infra/index',['school_details_id' => $model->id,'dataProvider'=>$infraDataProvider,'searchModel'=>$infraSearchModel]); ?>
    <?= Yii::$app->controller->renderPartial('/schooldetails-syllabus/index',['school_details_id' => $model->id,'dataProvider'=>$syllabusDataProvider,'searchModel'=>$syllabusSearchModel]); ?>
</div>
