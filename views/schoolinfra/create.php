<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SchoolInfra */

$this->title = 'Create School Infra';
$this->params['breadcrumbs'][] = ['label' => 'School Infras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-infra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
