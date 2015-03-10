<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'banner-form',
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
            echo BannerCategory::get_category_new('Banner', 'catid');
        } else {
            echo BannerCategory::get_category_update('Banner', 'catid', $model->catid);
        }
        ?>
    </div>
</div>
<?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>
<div class="row-fluid">
    <div class="span5">
        <?php echo $form->fileFieldControlGroup($model, 'banner', array('maxlength' => 255, 'class' => 'span12')); ?>
    </div>
</div>
<?php echo $form->textFieldControlGroup($model, 'clickurl', array('class' => 'span5', 'maxlength' => 200)); ?>
<?php echo $form->labelEx($model, 'description'); ?>
<?php
$this->widget('application.extensions.xheditor.JXHEditor', array(
    'model' => $model,
    'attribute' => 'description',
    'htmlOptions' => array('class' => 'xheditor-simple span6', 'style' => 'height: 150px;'),
));
?>
<div class="row-fluid">
    <div class="span2">
        <?php echo $form->textFieldControlGroup($model, 'ordering', array('class' => 'span12')); ?>
    </div>
    <div class="span2">
        <?php echo $form->dropDownListControlGroup($model, 'published', array('1' => 'Yes', '0' => 'No'), array('class' => 'span12')); ?>
    </div>
    <div class="span2">
        <?php echo $form->dropDownListControlGroup($model, 'sticky', array('1' => 'Yes', '0' => 'No'), array('class' => 'span12')); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span3">
        <?php echo $form->labelEx($model, 'publish_up'); ?>
        <?php
        echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
            'language' => 'en',
            'model' => $model, // Model object
            'attribute' => 'publish_up',
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
                'placeholder' => 'Register Date',
                'class' => 'span12',
            ),
                ), true);
        ?>
    </div>
    <div class="span3">
        <?php echo $form->labelEx($model, 'publish_down'); ?>
        <?php
        echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
            'language' => 'en',
            'model' => $model, // Model object
            'attribute' => 'publish_down',
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
                'placeholder' => 'Register Date',
                'class' => 'span12',
            ),
                ), true);
        ?>
    </div>
</div>
<div class="form-actions">
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>
<?php $this->endWidget(); ?>