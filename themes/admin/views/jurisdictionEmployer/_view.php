<?php
/* @var $this JurisdictionEmployerController */
/* @var $data JurisdictionEmployer */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax_employer')); ?>:</b>
	<?php echo CHtml::encode($data->tax_employer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax_area')); ?>:</b>
	<?php echo CHtml::encode($data->tax_area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('character_id')); ?>:</b>
	<?php echo CHtml::encode($data->character_id); ?>
	<br />


</div>