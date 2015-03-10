<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'content-form',
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
            echo ContentCategory::get_category_new('Content', 'catid');
        } else {
            echo ContentCategory::get_category_update('Content', 'catid', $model->catid);
        }
        ?>
    </div>
</div>
<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span12', 'maxlength' => 255)); ?>
<div class="control-group">
	<label for="form-field-1" class="control-label"><?php echo $form->labelEx($model, 'introtext'); ?></label>
	<div class="controls">
		<?php
		$this->widget('application.extensions.yii-ckeditor.CKEditorWidget', array(
			'model' => $model,
			'attribute' => 'introtext',
			// editor options http://docs.ckeditor.com/#!/api/CKEDITOR.config
			'config' => array(
				'language' => 'en',
			//'toolbar' => 'Basic',
			),
		));
		?>
	</div>
</div>
<?php
//$this->widget(
//        'ext.widgets.redactorjs.Redactor', array(
//    'editorOptions' => array(
//        'imageUpload' => Yii::app()->createAbsoluteUrl('/content/upload'),
//        'imageGetJson' => Yii::app()->createAbsoluteUrl('/content/listimages')
//    ),
//    'model' => $model,
//    'attribute' => 'introtext'));
?>
<div class="row-fluid">
    <div class="span2">
        <?php echo $form->dropDownListControlGroup($model, 'state', array('1' => 'Yes', '0' => 'No'), array('class' => 'span12')); ?>
    </div>
    <div class="span2">
        <?php echo $form->dropDownListControlGroup($model, 'featured', array('1' => 'Yes', '0' => 'No'), array('class' => 'span12')); ?>
    </div>
    <div class="span2">
        <?php echo $form->textFieldControlGroup($model, 'ordering', array('class' => 'span12')); ?>
    </div>
    <div class="span4">
        <?php echo $form->fileFieldControlGroup($model, 'profile_picture', array('size' => 36, 'maxlength' => 255, 'class' => 'span12')); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <?php echo $form->textAreaControlGroup($model, 'metakey', array('rows' => 2, 'cols' => 50, 'class' => 'span12')); ?>
    </div>
    <div class="span6">
        <?php echo $form->textAreaControlGroup($model, 'metadesc', array('rows' => 2, 'cols' => 50, 'class' => 'span12')); ?>
    </div>
</div>
<div class="form-actions">
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>
<?php $this->endWidget(); ?>