<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<?php echo $form->textFieldControlGroup($model, 'full_name', array('class' => 'span5', 'maxlength' => 250)); ?>
<?php echo $form->textFieldControlGroup($model, 'email', array('class' => 'span5', 'maxlength' => 200)); ?>
<?php echo $form->textFieldControlGroup($model, 'user_id', array('class' => 'span5', 'maxlength' => 10)); ?>
<?php echo $form->dropDownListControlGroup($model, 'confirmed', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>
<?php echo $form->dropDownListControlGroup($model, 'enabled', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>
<?php echo $form->dropDownListControlGroup($model, 'accept', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>
<div class="form-actions">
    <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>
<?php $this->endWidget(); ?>
