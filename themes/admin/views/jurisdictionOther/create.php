<?php
/* @var $this JurisdictionOtherController */
/* @var $model JurisdictionOther */
?>

<?php
$this->pageTitle = 'New Others - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Jurisdiction Others' => array('admin'),
    'Create',
);

$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/jquery.chained.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript('chain-select', " 
$('#JurisdictionOther_profession_type').chained('#JurisdictionOther_district');
$('#JurisdictionOther_range').chained('#JurisdictionOther_zone');
$('#JurisdictionOther_circle').chained('#JurisdictionOther_zone');
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>New Others</h5>
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