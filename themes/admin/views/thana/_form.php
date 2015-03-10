<?php
/* @var $this ThanaController */
/* @var $model Thana */
/* @var $form TbActiveForm */
?>
<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'thana-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->dropDownListControlGroup($model, 'country_id', CHtml::listData(Country::model()->findAll(array('condition' => 'published=1', "order" => "country_name")), 'id', 'country_name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php echo $form->dropDownListControlGroup($model, 'state_id', CHtml::listData(State::model()->findAll(array('condition' => 'published=1', "order" => "state_name")), 'id', 'state_name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php echo $form->dropDownListControlGroup($model, 'city_id', CHtml::listData(City::model()->findAll(array('condition' => 'published=1', "order" => "city_name")), 'id', 'city_name'), array('empty' => '--please select--', 'class' => 'span5')); ?>    
    <?php echo $form->dropDownListControlGroup($model, 'district_id', CHtml::listData(District::model()->findAll(array('condition' => 'published=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>    
    <?php echo $form->textFieldControlGroup($model, 'title', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->dropDownListControlGroup($model, 'published', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>
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