<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form TbActiveForm */
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'menu-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->labelEx($model, 'parent'); ?>
<?php
if ($model->isNewRecord) {
    echo Menu::get_menu_new();
} else {
    echo Menu::get_menu_update($model->parent);
}
?>
<?php echo $form->textFieldControlGroup($model, 'title', array('span' => 5, 'maxlength' => 150)); ?>
<?php echo $form->textFieldControlGroup($model, 'controller', array('span' => 5, 'maxlength' => 50)); ?>
<?php echo $form->textFieldControlGroup($model, 'url', array('span' => 5, 'maxlength' => 100)); ?>
<?php echo $form->textFieldControlGroup($model, 'icon', array('span' => 5, 'maxlength' => 50)); ?>
<div class="row-fluid">
    <div class="span2">
        <?php echo $form->textFieldControlGroup($model, 'ordering', array('span' => 12)); ?>
    </div>
    <div class="span3">
        <?php echo $form->DropDownListControlGroup($model, 'status', array('1' => 'Active', '0' => 'Inactive'), array('class' => 'span12')); ?>
    </div>
</div>
<div class="form-actions">
    <?php
    echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
        'size' => TbHtml::BUTTON_SIZE_DEFAULT,
    ));
    ?>
    <?php
    echo TbHtml::resetButton('Reset', array(
        'color' => TbHtml::BUTTON_COLOR_DEFAULT,
        'size' => TbHtml::BUTTON_SIZE_DEFAULT,
    ));
    ?>
</div>
<?php $this->endWidget(); ?>