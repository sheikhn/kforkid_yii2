<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchooldetailsLevelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = (!isset($isPartialRender) || !$isPartialRender) ? $schoolName : '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-level-index">

    <h1><?= Html::encode(strtoupper($this->title)) ?></h1>

    <p>

        <!--<?= Html::a('Add School Levels', ['schooldetails-level/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']) ?>-->


         <?php if(!isset($isPartialRender) || !$isPartialRender){
                echo Html::a('Next', ['/schooldetails-infra/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']);
                }else{

                } ?>
      
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-plus"></span> View School Levels</a>
            </h4>
        </div>
        <div id="collapseFive" class="panel-collapse collapse">
            <div class="panel-body">
                 <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            //'school_level_id',
                            [
                             'attribute' => 'Level_types',
                             'value'=>function ($model, $key, $index, $column) {
                                return $model->schoolLevel->level;
                                }
                             ],

                            ['class' => 'yii\grid\ActionColumn','template'=>'{delete}'],
                          //  ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
                        ],
                    ]); 
                  ?>
            </div>
        </div>
    </div>

</div>
