<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SchooldetailsLevel */

$this->title = $schoolName;
$this->params['breadcrumbs'][] = ['label' => 'Schooldetails Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schooldetails-level-create">

    <h1><?= Html::encode(strtoupper($this->title)) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
