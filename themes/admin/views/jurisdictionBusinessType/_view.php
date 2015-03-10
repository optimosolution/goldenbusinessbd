<?php
/* @var $this JurisdictionBusinessTypeController */
/* @var $data JurisdictionBusinessType */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business')); ?>:</b>
	<?php echo CHtml::encode($data->business); ?>
	<br />


</div>