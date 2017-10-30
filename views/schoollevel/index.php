<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchoollevelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'School Levels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-level-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create School Level', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>