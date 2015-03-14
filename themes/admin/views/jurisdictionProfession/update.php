<?php
/* @var $this JurisdictionProfessionController */
/* @var $model JurisdictionProfession */
?>

<?php
$this->pageTitle = 'Edit Professions - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Professions' => array('admin'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/jquery.chained.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript('chain-select', " 
$('#JurisdictionProfession_profession_type').chained('#JurisdictionProfession_district');
$('#JurisdictionProfession_range').chained('#JurisdictionProfession_zone');
$('#JurisdictionProfession_circle').chained('#JurisdictionProfession_zone');
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Edit Professions</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-eye-open"></i>', array('view', 'id' => $model->id), array('data-rel' => 'tooltip', 'title' => 'Details', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create'), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->