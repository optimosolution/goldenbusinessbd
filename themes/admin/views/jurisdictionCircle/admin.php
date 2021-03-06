<?php
/* @var $this JurisdictionCircleController */
/* @var $model JurisdictionCircle */

$this->pageTitle = 'Circles - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Circles' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jurisdiction-circle-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Circles</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create'), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-search"></i>', '#', array('class' => 'search-button', 'data-rel' => 'tooltip', 'title' => 'Search', 'data-placement' => 'bottom')); ?>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <div class="search-form" style="display:none">
                <?php
                $this->renderPartial('_search', array(
                    'model' => $model,
                ));
                ?>
            </div><!-- search-form -->

            <?php
            $this->widget('bootstrap.widgets.TbGridView', array(
                'id' => 'jurisdiction-circle-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'zone_id',
                        'type' => 'raw',
                        'value' => 'JurisdictionZone::get_title($data->zone_id)',
                        'filter' => CHtml::activeDropDownList($model, 'zone_id', CHtml::listData(JurisdictionZone::model()->findAll(array('condition' => '', 'order' => 'tax_taxes_zone')), 'id', 'tax_taxes_zone'), array('empty' => 'All', 'class' => 'select2')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Zone'),
                    ),
                    array(
                        'name' => 'ranges',
                        'type' => 'raw',
                        'value' => 'JurisdictionRange::get_title($data->ranges)',
                        'filter' => CHtml::activeDropDownList($model, 'ranges', CHtml::listData(JurisdictionRange::model()->findAll(array('condition' => '', 'order' => 'title')), 'id', 'title'), array('empty' => 'All', 'class' => 'select2')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Ranges'),
                    ),
                    'tax_taxes_circle',
                    'address',
                    array(
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->