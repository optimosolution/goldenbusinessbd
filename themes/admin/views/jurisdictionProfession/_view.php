<?php
/* @var $this JurisdictionProfessionController */
/* @var $data JurisdictionProfession */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('income_source')); ?>:</b>
	<?php echo CHtml::encode($data->income_source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('district')); ?>:</b>
	<?php echo CHtml::encode($data->district); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profession_type')); ?>:</b>
	<?php echo CHtml::encode($data->profession_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('letter_specific_name')); ?>:</b>
	<?php echo CHtml::encode($data->letter_specific_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zone')); ?>:</b>
	<?php echo CHtml::encode($data->zone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('range')); ?>:</b>
	<?php echo CHtml::encode($data->range); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('circle')); ?>:</b>
	<?php echo CHtml::encode($data->circle); ?>
	<br />

	*/ ?>

</div>