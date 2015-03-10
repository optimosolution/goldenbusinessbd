<?php
/* @var $this JurisdictionCharacterController */
/* @var $data JurisdictionCharacter */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('character_name')); ?>:</b>
	<?php echo CHtml::encode($data->character_name); ?>
	<br />


</div>