<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchooldetailsInfraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = (!isset($isPartialRender) || !$isPartialRender) ? $schoolName : '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-infra-index">

    <h1><?= Html::encode(strtoupper($this->title)) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

        <!--<?= Html::a('Add School Infrastructures', ['schooldetails-infra/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']) ?>-->

        <?php if(!isset($isPartialRender) || !$isPartialRender){
                    echo Html::a('Next', ['/schooldetails-cca/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']);
               }else{

                } ?>

       
    </p>
   

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-plus"></span> View School InfraStructures</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                     <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                [
                                 'attribute' => 'Infrastructures_types',
                                 'value'=>function ($model, $key, $index, $column) {
                                    return $model->schoolInfra->name;
                                    }
                                 ],

                                ['class' => 'yii\grid\ActionColumn','template'=>'{delete}'],
                            ],
                        ]); 

                       ?>
                </div>
            </div>
        </div>

</div>
