<?php
/* @var $this JurisdictionCircleController */
/* @var $model JurisdictionCircle */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'zone_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'tax_taxes_circle',array('span'=>5,'maxlength'=>200)); ?>

                    <?php echo $form->textAreaControlGroup($model,'address',array('rows'=>6,'span'=>8)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->