<?php
$form = $this->beginWidget('CActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<div class="row">
    <div class="col-md-3">
        <?php echo $form->dropDownList($model_company, 'district', CHtml::listData(JurisdictionDistrict::model()->findAll(array('condition' => '', "order" => "taxes_area")), 'id', 'taxes_area'), array('empty' => '--please select--', 'class' => 'form-control')); ?>
    </div>
    <div class="col-md-3">
        <?php echo JurisdictionCompanyType::get_type_list_frontend('JurisdictionCompany', 'company_type', $model_company->company_type); ?>
    </div>
    <div class="col-md-3">
        <?php echo JurisdictionCompany::get_list_frontend('JurisdictionCompany', 'letter_specific_name', $model_company->letter_specific_name); ?>
    </div>
    <div class="col-md-3">
        <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-sm btn-primary')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>