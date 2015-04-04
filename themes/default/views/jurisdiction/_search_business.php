<?php
$form = $this->beginWidget('CActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<div class="row">
    <div class="col-md-2">
        <?php echo $form->dropDownList($model_business, 'district', CHtml::listData(JurisdictionDistrict::model()->findAll(array('condition' => '', "order" => "taxes_area")), 'id', 'taxes_area'), array('empty' => '--please select--', 'class' => 'form-control')); ?>
    </div>
    <div class="col-md-2">
        <?php echo $form->dropDownList($model_business, 'btype', array('1' => 'Location', '0' => 'Business Type'), array('class' => 'form-control')); ?>
    </div>
    <div class="col-md-2">
        <?php echo JurisdictionBusinessType::get_type_list_frontend('JurisdictionBusiness', 'business_type', $model_business->business_type); ?>
    </div>
    <div class="col-md-2">
        <?php echo JurisdictionBusiness::get_list_frontend('JurisdictionBusiness', 'letter_specific_name', $model_business->letter_specific_name); ?>
    </div>
    <div class="col-md-2">
        <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-sm btn-primary')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>