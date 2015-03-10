<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-admin-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'username', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->passwordFieldControlGroup($model, 'password', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->textFieldControlGroup($model, 'email', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->textAreaControlGroup($model, 'about_me', array('rows' => 5, 'class' => 'span5')); ?>
<?php echo $form->dropDownListControlGroup($model, 'group_id', CHtml::listData(UserGroup::model()->findAll(array("order" => "id")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->dropDownListControlGroup($model, 'status', CHtml::listData(UserStatus::model()->findAll(array("order" => "status")), 'id', 'status'), array('empty' => '--please select--', 'class' => 'span5')); ?>        
<div class="row-fluid">
    <div class="span5">
        <?php echo $form->fileFieldControlGroup($model, 'profile_picture', array('maxlength' => 255, 'class' => 'span12')); ?>        
    </div>
</div>
<div class="form-actions">
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>
<?php $this->endWidget(); ?>
