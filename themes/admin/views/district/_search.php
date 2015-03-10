<?php
/* @var $this DistrictController */
/* @var $model District */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'country_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'state_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'city_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textFieldControlGroup($model,'published',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->