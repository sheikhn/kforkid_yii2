<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\SchoolLevel;
use app\models\SchoolCca;
use app\models\SchoolInfra;
use app\models\SchoolSyllabus;

/* @var $this yii\web\View */
/* @var $model app\models\SchoolDetails */
/* @var $form yii\widgets\ActiveForm */

$schoolLevels = ArrayHelper::map(SchoolLevel::find()->all(), 'id', 'level');
$schoolCcaList = ArrayHelper::map(SchoolCca::find()->all(), 'id', 'name');
$schoolInfraList = ArrayHelper::map(SchoolInfra::find()->all(), 'id', 'name');
$schoolSyllabusList = ArrayHelper::map(SchoolSyllabus::find()->all(), 'id', 'syllabus');

?>



<div class="school-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-plus"></span> 
                <?php if(!isset($flag) || !$flag){
                        echo "Edit School Statistics Details";
                        }else{
                           echo "Add School Statistics Details" ;
                        }
                ?>
                        </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                 <div class="row">
            <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'teacherratio')->textInput() ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'studentratio')->textInput() ?>
            </div>
            </div>
            <div class="row">
            <div class="col-md-4">
            <?= $form->field($model, 'rating')->textInput() ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'classroom')->textInput() ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'totalstudents')->textInput() ?>
            </div>
            </div>
            <div class="row">
            <div class="col-md-4">
            <?= $form->field($model, 'playgroundsize')->textInput() ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'campussize')->textInput() ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'sslcfirstclass')->textInput() ?>
            </div>
            </div>
            <div class="row">
            <div class="col-md-4">
            <?= $form->field($model, 'studentmaleratio')->textInput() ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'studentfemaleratio')->textInput() ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'teachermaleratio')->textInput() ?>
            </div>
            </div>
            <div class="row">
            <div class="col-md-4">
            <?= $form->field($model, 'teacherfemaleratio')->textInput() ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'minoritystudents')->textInput() ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'avgyearlycost')->textInput() ?>
            </div>
            </div>
            </div>
        </div>
    </div>

   
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-plus"></span> 
                <?php if(!isset($flag) || !$flag){
                        echo "Edit School Levels";
                        }else{
                           echo "Add School Levels" ;
                        }
                ?>

               </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <?= $form->field($modellevel, 'school_level_id')->checkboxList($schoolLevels); ?>
            </div>
        </div>
    </div>



    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-plus"></span>
                <?php if(!isset($flag) || !$flag){
                        echo "Edit School Extra Co-Curricular Activities";
                        }else{
                           echo "Add School Extra Co-Curricular Activities" ;
                        }
                ?>
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <?= $form->field($modelcca, 'school_cca_id')->checkboxList($schoolCcaList); ?>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-plus"></span>
                <?php if(!isset($flag) || !$flag){
                        echo "Edit School InfraStructures";
                        }else{
                           echo "Add School InfraStructures" ;
                        }
                ?>
                </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse">
            <div class="panel-body">
                <?= $form->field($modelinfra, 'school_infra_id')->checkboxList($schoolInfraList); ?>
            </div>
        </div>
    </div>

    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-plus"></span>
                <?php if(!isset($flag) || !$flag){
                        echo "Edit School Syllabus";
                        }else{
                           echo "Add School Syllabus" ;
                        }
                ?>
                </a>
            </h4>
        </div>
        <div id="collapseFive" class="panel-collapse collapse">
            <div class="panel-body">
                <?= $form->field($modelsyllabus, 'school_syllabus_id')->checkboxList($schoolSyllabusList); ?>
            </div>
        </div>
    </div>

   
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><span class="glyphicon glyphicon-plus"></span>
                <?php if(!isset($flag) || !$flag){
                        echo "Edit School Address";
                        }else{
                           echo "Add School Address" ;
                        }
                ?>
                </a>
            </h4>
        </div>
        <div id="collapseSix" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="row">
                <div class="col-md-6">
                <?= $form->field($modeladdress, 'Address_Line_1')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                <?= $form->field($modeladdress, 'Address_Line_2')->textInput(['maxlength' => true]) ?>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                <?= $form->field($modeladdress, 'Landline_Number')->textInput() ?>
                </div>
                <div class="col-md-6">
                <?= $form->field($modeladdress, 'Alternative_Landline_Number')->textInput() ?>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                <?= $form->field($modeladdress, 'Cell_Number')->textInput() ?>
                </div>
                <div class="col-md-6">
                <?= $form->field($modeladdress, 'Alternative_Cell_Number')->textInput() ?>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                <?= $form->field($modeladdress, 'Pincode')->textInput() ?>
                </div>
                <div class="col-md-4">
                <?= $form->field($modeladdress, 'City')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                <?= $form->field($modeladdress, 'State')->textInput(['maxlength' => true]) ?>
                </div>
                </div>
            </div>
        </div>
    </div>


    



     



                <?php if(!isset($flag) || !$flag){ ?>
                         <div class="form-group">
                            <?= Html::submitButton('Save' , ['class' => 'btn btn-primary']) ?>
                         </div>
                    <?php  }else{ ?>
                          <div class="form-group">
                             <?= Html::submitButton('Create' , ['class' => 'btn btn-primary']) ?>
                         </div>
                <?php   } ?>
               



    
       


    <?php ActiveForm::end(); ?>


</div>
