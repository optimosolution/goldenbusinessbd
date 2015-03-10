<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldControlGroup($model, 'username', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldControlGroup($model, 'email', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldControlGroup($model, 'registerDate', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'lastvisitDate', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'group_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'status', array('class' => 'span5')); ?>
<div class="form-actions">
    <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>

<?php $this->endWidget(); ?>
