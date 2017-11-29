<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchooldetailsSyllabusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = (!isset($isPartialRender) || !$isPartialRender) ? $schoolName : '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-syllabus-index">

    <h1><?= Html::encode(strtoupper($this->title)) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

        <?= Html::a('Edit School Syllabus', ['schooldetails-syllabus/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']) ?>

       

         <?php if(!isset($isPartialRender) || !$isPartialRender){
                    echo Html::a('Next', ['/schooldetails-address/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']);
                }else{

                    }   ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
             'attribute' => 'school_syllabus_syllabus',
             'value'=>function ($model, $key, $index, $column) {
                return $model->schoolSyllabus->syllabus;
                }
             ],

            ['class' => 'yii\grid\ActionColumn','template'=>'{delete}'],
        ],
    ]); ?>
</div>
