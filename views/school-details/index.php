<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchoolDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'School Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-details-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create School Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'address',
            'contact',
            //'rating',
            // 'studentratio',
            // 'teacherratio',
            // 'classroom',
            // 'totalstudents',
            // 'playgroundsize',
            // 'campussize',
            // 'sslcfirstclass',
            // 'studentmaleratio',
            // 'studentfemaleratio',
            // 'teachermaleratio',
            // 'teacherfemaleratio',
            // 'minoritystudents',
            // 'avgyearlycost',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
