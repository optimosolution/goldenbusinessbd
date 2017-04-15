<?php
/* @var $this ExamController */
/* @var $model Exam */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'exam-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user'); ?>
		<?php echo $form->textField($model,'user'); ?>
		<?php echo $form->error($model,'user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question'); ?>
		<?php echo $form->textField($model,'question'); ?>
		<?php echo $form->error($model,'question'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer'); ?>
		<?php echo $form->textField($model,'answer'); ?>
		<?php echo $form->error($model,'answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correct'); ?>
		<?php echo $form->textField($model,'correct'); ?>
		<?php echo $form->error($model,'correct'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->