<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsCca */

$this->title = $schoolName;
$this->params['breadcrumbs'][] = ['label' => 'Schooldetails Ccas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-cca-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
