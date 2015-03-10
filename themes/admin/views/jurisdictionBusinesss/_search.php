<?php
/* @var $this JurisdictionBusinesssController */
/* @var $model JurisdictionBusinesss */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'district_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'business_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'location_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'character_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'assessee',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'zone',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'circle',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->