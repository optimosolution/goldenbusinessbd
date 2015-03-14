<?php
/* @var $this JurisdictionLocationController */
/* @var $model JurisdictionLocation */

$this->pageTitle = 'Locations - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Locations' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jurisdiction-location-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Locations</h5>
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
        <div class="search-form" style="display:none">
            <?php
            $this->renderPartial('_search', array(
                'model' => $model,
            ));
            ?>
        </div><!-- search-form -->

        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'jurisdiction-location-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                array(
                    'name' => 'income_source',
                    'type' => 'raw',
                    'value' => '$data->incomeSource->title',
                    'filter' => CHtml::activeDropDownList($model, 'income_source', CHtml::listData(JurisdictionIncomeSource::model()->findAll(array('condition' => '', 'order' => 'title')), 'id', 'title'), array('empty' => 'All', 'class' => 'select2')),
                    'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Income Source'),
                ),
                array(
                    'name' => 'district',
                    'type' => 'raw',
                    'value' => '$data->district0->taxes_area',
                    'filter' => CHtml::activeDropDownList($model, 'district', CHtml::listData(JurisdictionDistrict::model()->findAll(array('condition' => '', 'order' => 'taxes_area')), 'id', 'taxes_area'), array('empty' => 'All', 'class' => 'select2')),
                    'htmlOptions' => array('style' => "text-align:left;", 'title' => 'District'),
                ),
                'title',
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                ),
            ),
        ));
        ?>
    </div>
</div><!--/.widget-body -->
</div><!--/.widget-box -->