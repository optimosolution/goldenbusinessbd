<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<?php echo $form->dropDownListControlGroup($model, 'parent', CHtml::listData(DocumentCategory::model()->findAll(array('condition' => 'parent=0', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->dropDownListControlGroup($model, 'published', array('' => 'All', '1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>
<?php echo $form->dropDownListControlGroup($model, 'created_by', CHtml::listData(UserAdmin::model()->findAll(array('select' => 'id, name', 'condition' => '', "order" => "name")), 'id', 'name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<div class="form-actions">
    <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>
<?php $this->endWidget(); ?>