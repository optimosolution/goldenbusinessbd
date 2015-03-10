<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldControlGroup($model, 'state', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'catid', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldControlGroup($model, 'created', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'created_by', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldControlGroup($model, 'modified', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'modified_by', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldControlGroup($model, 'publish_up', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'publish_down', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'featured', array('class' => 'span5')); ?>
<div class="form-actions">
    <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>

<?php $this->endWidget(); ?>
