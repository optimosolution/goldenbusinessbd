<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<?php echo $form->dropDownListControlGroup($model, 'controller_id', CHtml::listData(AclController::model()->findAll(array('condition' => '', "order" => "controller")), 'id', 'controller'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'action', array('class' => 'span5', 'maxlength' => 150)); ?>
<div class="form-actions">
    <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>

<?php $this->endWidget(); ?>
