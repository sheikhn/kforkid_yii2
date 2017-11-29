<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchooldetailsCcaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = (!isset($isPartialRender) || !$isPartialRender) ? $schoolName : '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-cca-index">

    <h1><?= Html::encode(strtoupper($this->title)) ?></h1>

    <p>
        <?= Html::a('Edit School Co-Curricular Activities and Extra-Curricular Activites', ['schooldetails-cca/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']) ?>

        <?php if(!isset($isPartialRender) || !$isPartialRender){
            echo Html::a('Next', ['/schooldetails-syllabus/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']);
        }else{
           
            } ?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
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
