<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchooldetailsCcaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schooldetails Ccas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-cca-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Schooldetails Cca', ['schooldetails-cca/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']) ?>
         <?= (!isset($isDetailView) || !$isDetailView) ? Html::a('Create Schooldetails Syllabus', ['/schooldetails-syllabus/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']) : '' ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
             [
             'attribute' => 'school_cca_name',
             'value'=>function ($model, $key, $index, $column) {
                return $model->schoolCca->name;
                }
             ],
            

            ['class' => 'yii\grid\ActionColumn','template'=>'{delete}'],
        ],
    ]); ?>
</div>
