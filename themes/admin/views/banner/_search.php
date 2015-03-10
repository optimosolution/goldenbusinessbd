<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldControlGroup($model, 'id', array('class' => 'span5', 'maxlength' => 11)); ?>

<?php echo $form->textFieldControlGroup($model, 'catid', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldControlGroup($model, 'alias', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldControlGroup($model, 'banner', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'clickurl', array('class' => 'span5', 'maxlength' => 200)); ?>

<?php echo $form->textAreaControlGroup($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldControlGroup($model, 'sticky', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'ordering', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'created_on', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'created_by', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'publish_up', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'publish_down', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>

<?php $this->endWidget(); ?>
