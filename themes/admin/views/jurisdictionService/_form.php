<?php
/* @var $this JurisdictionServiceController */
/* @var $model JurisdictionService */
/* @var $form TbActiveForm */
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'jurisdiction-service-form',
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
<div class="row-fluid">
    <div class="span5">
        <?php echo $form->labelEx($model, 'employer_type'); ?>
        <?php echo JurisdictionEmployerType::get_type_list('JurisdictionService', 'employer_type', $model->employer_type); ?>
    </div>
</div>
<?php echo $form->textFieldControlGroup($model, 'letter_specific_name', array('span' => 5)); ?>
<?php echo $form->dropDownListControlGroup($model, 'zone', CHtml::listData(JurisdictionZone::model()->findAll(array('condition' => '', "order" => "tax_taxes_zone")), 'id', 'tax_taxes_zone'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<div class="row-fluid">
    <div class="span5">
        <?php echo $form->labelEx($model, 'range'); ?>
        <?php echo JurisdictionRange::get_range_list('JurisdictionService', 'range', $model->range); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span5">
        <?php echo $form->labelEx($model, 'circle'); ?>
        <?php echo JurisdictionCircle::get_cicle_list('JurisdictionService', 'circle', $model->circle); ?>
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