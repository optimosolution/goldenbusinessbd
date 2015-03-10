<?php
/* @var $this JurisdictionCompanyTypeController */
/* @var $data JurisdictionCompanyType */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_type')); ?>:</b>
	<?php echo CHtml::encode($data->company_type); ?>
	<br />


</div>