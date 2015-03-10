<?php
/* @var $this MassmailController */
/* @var $model Massmail */
/* @var $form TbActiveForm */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'massmail-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldControlGroup($model, 'subject', array('span' => 12, 'maxlength' => 250)); ?>
    <?php echo $form->labelEx($model, 'message_body'); ?>
    <?php $this->widget('application.extensions.widgets.redactorjs.Redactor', array('model' => $model, 'toolbar' => 'default', 'attribute' => 'message_body', 'editorOptions' => array('autoresize' => true),)); ?>
    <div class="row-fluid">
        <div class="span2">
            <?php echo $form->dropDownListControlGroup($model, 'user_group', CHtml::listData(UserGroup::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span12')); ?>
        </div>
        <div class="span2">
            <?php echo $form->dropDownListControlGroup($model, 'user_status', CHtml::listData(UserStatus::model()->findAll(array('condition' => '', "order" => "status")), 'id', 'status'), array('empty' => '--please select--', 'class' => 'span12')); ?>
        </div>
    </div>
    <div class="form-actions">
        <?php
        echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->