<?php
/* @var $this SroController */
/* @var $model Sro */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sro-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sro_type'); ?>
		<?php echo $form->textField($model,'sro_type'); ?>
		<?php echo $form->error($model,'sro_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sl_no'); ?>
		<?php echo $form->textField($model,'sl_no'); ?>
		<?php echo $form->error($model,'sl_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sro_no'); ?>
		<?php echo $form->textField($model,'sro_no',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'sro_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sro_date'); ?>
		<?php echo $form->textField($model,'sro_date'); ?>
		<?php echo $form->error($model,'sro_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'summary'); ?>
		<?php echo $form->textField($model,'summary',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'summary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attach_file'); ?>
		<?php echo $form->textField($model,'attach_file',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'attach_file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->