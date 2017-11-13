<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchooldetailsInfraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = (isset($isPartialRender) && $isPartialRender) ? $schoolName : '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-infra-index">

    <h1><?= Html::encode(strtoupper($this->title)) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Edit School Infrastructures', ['create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Next', ['/schooldetails-cca/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']) ?>
    </p>
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
    ]); ?>
</div>
