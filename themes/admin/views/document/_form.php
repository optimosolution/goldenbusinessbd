<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'document-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
    <div class="span12">
        <?php
        if ($model->isNewRecord) {
            echo DocumentCategory::get_category_new('Document', 'catid');
        } else {
            echo DocumentCategory::get_category_update('Document', 'catid', $model->catid);
        }
        ?>
    </div>
</div>
<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
<div class="row-fluid">
    <div class="span5">
        <?php echo $form->fileFieldControlGroup($model, 'doc_file', array('maxlength' => 255, 'class' => 'span12')); ?>
    </div>
</div>
<?php echo $form->labelEx($model, 'summary'); ?>
<?php
$this->widget('application.extensions.xheditor.JXHEditor', array(
    'model' => $model,
    'attribute' => 'summary',
    'htmlOptions' => array('class' => 'xheditor', 'style' => 'width: 100%; height: 150px;', 'placeholder' => 'Summary'),
));
?>
<div class="form-actions">
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>

<?php $this->endWidget(); ?>
