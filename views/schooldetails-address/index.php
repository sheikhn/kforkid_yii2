<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchooldetailsAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = (!isset($isPartialRender) || !$isPartialRender) ? $schoolName : '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>


        <!--<?= Html::a('Add Schooldetails Address', ['schooldetails-address/create','school_details_id'=>$school_details_id], ['class' => 'btn btn-success']) ?>-->

        <?php if(!isset($isPartialRender) || !$isPartialRender){
                    echo Html::a('View  Schooldetails', ['/school-details/view', 'id' => $school_details_id], ['class' => 'btn btn-success']);
               }else{

                }   ?>


    </p>

    


        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-plus"></span> View School Address</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                              //  'id',
                               // 'school_details_id',
                                'State',
                                'City',
                                'Pincode',

                                ['class' => 'yii\grid\ActionColumn','template'=>'{delete}'],
                            ],
                        ]); 
                    ?>
                </div>
            </div>
        </div>

</div>
