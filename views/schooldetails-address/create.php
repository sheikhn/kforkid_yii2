<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsAddress */

$this->title = $schoolName;
$this->params['breadcrumbs'][] = ['label' => 'Schooldetails Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-address-create">

    <h1><?= Html::encode(strtoupper($this->title)) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
