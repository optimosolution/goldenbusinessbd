<?php
/* @var $this EdirectoryController */
/* @var $model Edirectory */
/* @var $form TbActiveForm */
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'edirectory-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->labelEx($model, 'category'); ?>
<div class="row-fluid">
    <div class="span12">
        <?php
        if ($model->isNewRecord) {
            echo DirectoryCategory::get_category_new('Edirectory', 'category');
        } else {
            echo DirectoryCategory::get_category_update('Edirectory', 'category', $model->category);
        }
        ?>
    </div>
</div>
<?php echo $form->textFieldControlGroup($model, 'title', array('span' => 5, 'maxlength' => 255)); ?>    
<?php echo $form->textFieldControlGroup($model, 'telephone', array('span' => 5, 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'mobile', array('span' => 5, 'maxlength' => 100)); ?>
<?php echo $form->textFieldControlGroup($model, 'email', array('span' => 5, 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'fax', array('span' => 5, 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'website', array('span' => 5, 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'address', array('span' => 5, 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'postcode', array('span' => 5, 'maxlength' => 50)); ?>
<?php echo $form->dropDownListControlGroup($model, 'country', CHtml::listData(Country::model()->findAll(array('condition' => 'published=1', "order" => "country_name")), 'id', 'country_name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<div class="row-fluid">
    <div class="span5">
        <?php echo $form->labelEx($model, 'state'); ?>
        <?php echo State::get_sate_list('Edirectory', 'state', $model->state); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span5">
        <?php echo $form->labelEx($model, 'city'); ?>
        <?php echo City::get_city_list('Edirectory', 'city', $model->city); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span5">
        <?php echo $form->labelEx($model, 'district'); ?>
        <?php echo District::get_district_list('Edirectory', 'district', $model->district); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span5">
        <?php echo $form->labelEx($model, 'thana'); ?>
        <?php echo Thana::get_thana_list('Edirectory', 'thana', $model->thana); ?>
    </div>
</div>
<?php echo $form->labelEx($model, 'details'); ?>
<?php
$this->widget('application.extensions.xheditor.JXHEditor', array(
    'model' => $model,
    'attribute' => 'details',
    'htmlOptions' => array('class' => 'xheditor', 'style' => 'width: 100%; height: 150px;'),
));
?>
<?php echo $form->dropDownListControlGroup($model, 'published', array('1' => 'Yes', '0' => 'No')); ?>
<div class="form-actions">
    <?php
    echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
        'size' => TbHtml::BUTTON_SIZE_LARGE,
    ));
    ?>
</div>
<?php $this->endWidget(); ?>