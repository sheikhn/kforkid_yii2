<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsAddress */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schooldetails Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-address-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'school_details_id' => $model->school_details_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'school_details_id' => $model->school_details_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'school_details_id',
            'Address_Line_1',
            'Address_Line_2',
            'Landline_Number',
            'Alternative_Landline_Number',
            'Cell_Number',
            'Alternative_Cell_Number',
            'Pincode',
            'City',
            'State',
        ],
    ]) ?>

</div>
