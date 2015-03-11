<?php
/* @var $this JurisdictionProfessionController */
/* @var $model JurisdictionProfession */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'jurisdiction-profession-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'district_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'profession_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'character_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'assessee',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'circle',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'zone',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->