<?php
/* @var $this JurisdictionController */
/* @var $model JurisdictionService */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<div class="row">
    <div class="col-md-3">
        <?php echo $form->dropDownList($model, 'district', CHtml::listData(JurisdictionDistrict::model()->findAll(array('condition' => '', "order" => "taxes_area")), 'id', 'taxes_area'), array('empty' => '--please select--', 'class' => 'form-control')); ?>
    </div>
    <div class="col-md-3">
        <?php echo JurisdictionEmployerType::get_type_list_frontend('JurisdictionService', 'employer_type', $model->employer_type); ?>
    </div>
    <div class="col-md-3">
        <?php echo JurisdictionService::get_list_frontend('JurisdictionService', 'letter_specific_name', $model->letter_specific_name); ?>
    </div>
    <div class="col-md-3">
        <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-sm btn-primary')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>