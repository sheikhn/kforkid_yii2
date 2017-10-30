<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SchoolCca */

$this->title = 'Create School Cca';
$this->params['breadcrumbs'][] = ['label' => 'School Ccas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-cca-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
