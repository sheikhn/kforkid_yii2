<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SchoolLevel */

$this->title = 'Create School Level';
$this->params['breadcrumbs'][] = ['label' => 'School Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-level-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
