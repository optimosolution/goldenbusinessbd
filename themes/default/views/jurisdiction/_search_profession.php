<?php
$form = $this->beginWidget('CActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<div class="row">
    <div class="col-md-3">
        <?php echo $form->dropDownList($model_profession, 'district', CHtml::listData(JurisdictionDistrict::model()->findAll(array('condition' => '', "order" => "taxes_area")), 'id', 'taxes_area'), array('empty' => '--please select--', 'class' => 'form-control')); ?>
    </div>
    <div class="col-md-3">
        <?php echo JurisdictionProfessionType::get_type_list_frontend('JurisdictionProfession', 'profession_type', $model_profession->profession_type); ?>
    </div>
    <div class="col-md-3">
        <?php echo JurisdictionProfession::get_list_frontend('JurisdictionProfession', 'letter_specific_name', $model_profession->letter_specific_name); ?>
    </div>
    <div class="col-md-3">
        <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-sm btn-primary')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>