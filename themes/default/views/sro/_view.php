<?php
/* @var $this SroController */
/* @var $data Sro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sro_type')); ?>:</b>
	<?php echo CHtml::encode($data->sro_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sl_no')); ?>:</b>
	<?php echo CHtml::encode($data->sl_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sro_no')); ?>:</b>
	<?php echo CHtml::encode($data->sro_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sro_date')); ?>:</b>
	<?php echo CHtml::encode($data->sro_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summary')); ?>:</b>
	<?php echo CHtml::encode($data->summary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attach_file')); ?>:</b>
	<?php echo CHtml::encode($data->attach_file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>