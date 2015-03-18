<?php
/* @var $this SroController */
/* @var $model Sro */
/* @var $form TbActiveForm */
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'sro-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->dropDownListControlGroup($model, 'sro_type', CHtml::listData(SroType::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>  
<?php echo $form->textFieldControlGroup($model, 'sl_no', array('span' => 5)); ?>
<?php echo $form->textFieldControlGroup($model, 'sro_no', array('span' => 5, 'maxlength' => 250)); ?>
<div class="row-fluid">
    <div class="span3">
        <?php echo $form->labelEx($model, 'sro_date'); ?>
        <?php
        echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
            'language' => 'en',
            'model' => $model, // Model object
            'attribute' => 'sro_date',
            'options' => array(
                'mode' => 'date',
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '1900:2200',
                'dateFormat' => 'yy-mm-dd',
                'timeFormat' => '',
                'showTimepicker' => false,
            ),
            'htmlOptions' => array(
                'placeholder' => 'SRO Date',
                'class' => 'span12',
            ),
                ), true);
        ?>
    </div>   
    <div class="control-group" style="clear: left;">
        <label for="form-field-1" class="control-label"><?php echo $form->labelEx($model, 'description'); ?></label>
        <div class="controls">
            <?php
            $this->widget('application.extensions.yii-ckeditor.CKEditorWidget', array(
                'model' => $model,
                'attribute' => 'description',
                // editor options http://docs.ckeditor.com/#!/api/CKEDITOR.config
                'config' => array(
                    'language' => 'en',
                //'toolbar' => 'Basic',
                ),
            ));
            ?>
        </div>
    </div>
    <?php echo $form->textFieldControlGroup($model, 'summary', array('span' => 5, 'maxlength' => 250)); ?>
    <?php echo $form->textAreaControlGroup($model, 'note', array('rows' => 2, 'span' => 5)); ?>
    <div class="row-fluid">
        <div class="span5">
            <?php echo $form->fileFieldControlGroup($model, 'attach_file', array('maxlength' => 255, 'class' => 'span12')); ?>
        </div>
    </div>
    <?php echo $form->dropDownListControlGroup($model, 'status', CHtml::listData(SroStatus::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <div class="form-actions">
        <?php
        echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>