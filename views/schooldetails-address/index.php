<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchooldetailsAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = (isset($isPartialRender) && $isPartialRender) ? $schoolName : '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Schooldetails Address', ['schooldetails-address/create','school_details_id'=>$school_details_id], ['class' => 'btn btn-success']) ?>

        <?= Html::a('View  Schooldetails', ['/school-details/view', 'id' => $school_details_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'school_details_id',
            'Address_Line_1',
            'Address_Line_2',
            'Landline_Number',
            // 'Alternative_Landline_Number',
            // 'Cell_Number',
            // 'Alternative_Cell_Number',
            // 'Pincode',
            // 'City',
            // 'State',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
