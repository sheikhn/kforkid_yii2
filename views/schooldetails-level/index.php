<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchooldetailsLevelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schooldetails Levels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-level-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Schooldetails Level', ['create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Schooldetails infra', ['/schooldetails-infra/create', 'school_details_id' => $school_details_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'school_level_id',
            [
             'attribute' => 'school_level_level',
             'value'=>function ($model, $key, $index, $column) {
                return $model->schoolLevel->level;
                }
             ],

            ['class' => 'yii\grid\ActionColumn','template'=>'{delete}'],
          //  ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
        ],
    ]); ?>
</div>
