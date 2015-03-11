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
<?php echo $form->dropDownListControlGroup($model, 'district_id', CHtml::listData(JurisdictionDistrict::model()->findAll(array('condition' => '', "order" => "taxes_area")), 'id', 'taxes_area'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->dropDownListControlGroup($model, 'employer_id', CHtml::listData(JurisdictionEmployer::model()->findAll(array('condition' => '', "order" => "tax_employer")), 'id', 'tax_employer'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->dropDownListControlGroup($model, 'character_id', CHtml::listData(JurisdictionCharacter::model()->findAll(array('condition' => '', "order" => "character_name")), 'id', 'character_name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'assessee', array('span' => 5, 'maxlength' => 255)); ?>
<?php echo $form->dropDownListControlGroup($model, 'zone', CHtml::listData(JurisdictionZone::model()->findAll(array('condition' => '', "order" => "tax_taxes_zone")), 'id', 'tax_taxes_zone'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->dropDownListControlGroup($model, 'circle', CHtml::listData(JurisdictionCircle::model()->findAll(array('condition' => '', "order" => "tax_taxes_circle")), 'id', 'tax_taxes_circle'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<div class="form-actions">
    <?php
    echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
        'size' => TbHtml::BUTTON_SIZE_LARGE,
    ));
    ?>
</div>
<?php $this->endWidget(); ?>