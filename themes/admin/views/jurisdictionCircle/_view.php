<?php
/* @var $this JurisdictionCircleController */
/* @var $data JurisdictionCircle */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zone_id')); ?>:</b>
	<?php echo CHtml::encode($data->zone_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax_taxes_circle')); ?>:</b>
	<?php echo CHtml::encode($data->tax_taxes_circle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />


</div>