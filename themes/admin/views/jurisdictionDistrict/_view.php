<?php
/* @var $this JurisdictionDistrictController */
/* @var $data JurisdictionDistrict */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taxes_area')); ?>:</b>
	<?php echo CHtml::encode($data->taxes_area); ?>
	<br />


</div>