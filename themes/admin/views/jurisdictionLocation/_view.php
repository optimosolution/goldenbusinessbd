<?php
/* @var $this JurisdictionLocationController */
/* @var $data JurisdictionLocation */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locations')); ?>:</b>
	<?php echo CHtml::encode($data->locations); ?>
	<br />


</div>