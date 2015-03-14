<?php
/* @var $this JurisdictionCompanyController */
/* @var $model JurisdictionCompany */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'income_source',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'district',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'company_type',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'letter_specific_name',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'zone',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'range',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'circle',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->