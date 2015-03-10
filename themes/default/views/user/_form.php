<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-sm-2">
            <?php echo $form->labelEx($model, 'name'); ?>
        </div>
        <div class="col-sm-4">           
            <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        </div>        
    </div>
    <br />
    <div class="row">
        <div class="col-sm-2">
            <?php echo $form->labelEx($model, 'username'); ?>
        </div>
        <div class="col-sm-4">                       
            <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 150, 'class' => 'form-control')); ?>
        </div>        
    </div>
    <br />
    <div class="row">
        <div class="col-sm-2">
            <?php echo $form->labelEx($model, 'email'); ?>
        </div>
        <div class="col-sm-4">                       
            <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>        
    </div>
    <br />
    <div class="row">
        <div class="col-sm-2">
            <?php echo $form->labelEx($model, 'password'); ?>
        </div>
        <div class="col-sm-4">           
            <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>        
    </div>    
    <br />
    <div class="row">
        <div class="col-sm-2">
            <?php echo $form->labelEx($model_profile, 'mobile'); ?>
        </div>
        <div class="col-sm-4">           
            <?php echo $form->textField($model_profile, 'mobile', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>        
    </div>    
    <br />
    <div class="row">
        <div class="col-sm-2">
            <?php echo $form->labelEx($model_profile, 'phone'); ?>
        </div>
        <div class="col-sm-4">           
            <?php echo $form->textField($model_profile, 'phone', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>        
    </div>    
    <br />
    <div class="row">
        <div class="col-sm-2">
            <?php echo $form->labelEx($model_profile, 'fax'); ?>
        </div>
        <div class="col-sm-4">           
            <?php echo $form->textField($model_profile, 'fax', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>        
    </div>    
    <br />
    <div class="row">
        <div class="col-sm-2">
            <?php echo $form->labelEx($model_profile, 'website'); ?>
        </div>
        <div class="col-sm-4">           
            <?php echo $form->textField($model_profile, 'website', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
        </div>        
    </div>    
    <br />
    <div class="row">
        <div class="col-sm-2">
            <?php echo $form->labelEx($model_profile, 'address'); ?>
        </div>
        <div class="col-sm-4">           
            <?php echo $form->textField($model_profile, 'address', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
        </div>        
    </div>    
    <br />
    <div class="row">
        <div class="col-sm-2">
            <?php echo $form->labelEx($model, 'about_me'); ?>
        </div>
        <div class="col-sm-4">           
            <?php echo $form->textArea($model, 'about_me', array('rows' => 4, 'class' => 'form-control')); ?>
        </div>        
    </div>    
    <br />
    <div class="row">
        <div class="col-sm-2">
            <?php echo $form->labelEx($model_profile, 'profile_picture'); ?>
        </div>
        <div class="col-sm-4">           
            <?php echo $form->fileField($model_profile, 'profile_picture', array('size' => 36, 'maxlength' => 255)); ?>
        </div>        
    </div>    
    <br />
    <div class="row">
        <div class="col-sm-2">            
        </div>
        <div class="col-sm-4">           
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary pull-right')); ?>
        </div>        
    </div> 
    <?php $this->endWidget(); ?>
</div><!-- form -->