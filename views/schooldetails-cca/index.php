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
        <!--<?= Html::a('Add School Co-Curricular Activities and Extra-Curricular Activites', ['schooldetails-cca/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']) ?>-->

        <?php if(!isset($isPartialRender) || !$isPartialRender){
            echo Html::a('Next', ['/schooldetails-syllabus/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']);
        }else{
           
            } ?>

    </p>
    


        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-plus"></span> View School Extra Co-Curricular Activities</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
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
                        ]); 
                    ?>
                </div>
            </div>
        </div>


</div>
