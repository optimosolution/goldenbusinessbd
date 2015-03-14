<?php
/* @var $this JurisdictionEmployerTypeController */
/* @var $model JurisdictionEmployerType */
/* @var $form TbActiveForm */
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'jurisdiction-employer-type-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->dropDownListControlGroup($model, 'income_source', CHtml::listData(JurisdictionIncomeSource::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('options' => array('1' => array('selected' => true)), 'class' => 'span5')); ?>
<?php echo $form->dropDownListControlGroup($model, 'district', CHtml::listData(JurisdictionDistrict::model()->findAll(array('condition' => '', "order" => "taxes_area")), 'id', 'taxes_area'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'title', array('span' => 5, 'maxlength' => 250)); ?>
<div class="form-actions">
    <?php
    echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
        'size' => TbHtml::BUTTON_SIZE_LARGE,
    ));
    ?>
</div>
<?php $this->endWidget(); ?>