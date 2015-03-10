<?php
/* @var $this JurisdictionProfessionController */
/* @var $data JurisdictionProfession */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('district_id')); ?>:</b>
	<?php echo CHtml::encode($data->district_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profession_id')); ?>:</b>
	<?php echo CHtml::encode($data->profession_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('character_id')); ?>:</b>
	<?php echo CHtml::encode($data->character_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assessee')); ?>:</b>
	<?php echo CHtml::encode($data->assessee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('circle')); ?>:</b>
	<?php echo CHtml::encode($data->circle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zone')); ?>:</b>
	<?php echo CHtml::encode($data->zone); ?>
	<br />


</div>