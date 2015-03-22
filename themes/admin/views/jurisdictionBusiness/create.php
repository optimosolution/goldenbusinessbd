<?php
/* @var $this JurisdictionBusinessController */
/* @var $model JurisdictionBusiness */
?>

<?php
$this->pageTitle = 'New Businesses - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Businesses' => array('admin'),
    'Create',
);
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/jquery.chained.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript('chain-select', " 
$('#JurisdictionBusiness_business_type').chained('#JurisdictionBusiness_district');
$('#JurisdictionBusiness_range').chained('#JurisdictionBusiness_zone');
$('#JurisdictionBusiness_circle').chained('#JurisdictionBusiness_zone');
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>New Businesses</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->