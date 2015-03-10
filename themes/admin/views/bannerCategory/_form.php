<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'content-category-form',
    'enableAjaxValidation' => false,
        ));
?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
    <div class="span12">
        <?php
        if ($model->isNewRecord) {
            echo BannerCategory::get_category_new('BannerCategory', 'parent_id');
        } else {
            echo BannerCategory::get_category_update('BannerCategory', 'parent_id', $model->parent_id);
        }
        ?>
    </div>
</div>
<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->labelEx($model, 'description'); ?>
<?php
$this->widget('application.extensions.xheditor.JXHEditor', array(
    'model' => $model,
    'attribute' => 'description',
    'htmlOptions' => array('class' => 'xheditor', 'style' => 'width: 100%; height: 150px;'),
));
?>
<?php echo $form->dropDownListControlGroup($model, 'published', array('1' => 'Yes', '0' => 'No')); ?>
<div class="form-actions">
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>
<?php $this->endWidget(); ?>