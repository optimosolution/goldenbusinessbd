<?php
$form = $this->beginWidget('CActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<div class="row">
    <div class="col-md-3">
        <?php echo $form->dropDownList($model_other, 'district', CHtml::listData(JurisdictionDistrict::model()->findAll(array('condition' => '', "order" => "taxes_area")), 'id', 'taxes_area'), array('empty' => '--please select--', 'class' => 'form-control')); ?>
    </div>
    <div class="col-md-3">
        <?php echo JurisdictionLocation::get_type_list_frontend('JurisdictionOther', 'profession_type', $model_other->profession_type); ?>
    </div>
    <div class="col-md-3">
        <?php echo JurisdictionOther::get_list_frontend('JurisdictionOther', 'letter_specific_name', $model_other->letter_specific_name); ?>
    </div>
    <div class="col-md-3">
        <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-sm btn-primary')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>