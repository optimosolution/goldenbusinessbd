<?php
/* @var $this SroController */
/* @var $model Sro */

$this->pageTitle = 'SROs - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Sros' => array('admin'),
    'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sro-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage SROs</h5>
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
                'id' => 'sro-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'sro_type',
                        'type' => 'raw',
                        'value' => '$data->sroType->title',
                        'filter' => CHtml::activeDropDownList($model, 'sro_type', CHtml::listData(SroType::model()->findAll(array('condition' => '', 'order' => 'title')), 'id', 'title'), array('empty' => 'All', 'class' => 'select2')),
                        'htmlOptions' => array('style' => "text-align:center; width:50px;", 'title' => 'Type'),
                    ),
                    'sl_no',
                    'sro_no',
                    array(
                        'name' => 'sro_date',
                        'value' => 'UserAdmin::get_date($data->sro_date)',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model, 'attribute' => 'sro_date', 'htmlOptions' => array('id' => 'datepicker1', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
                        'htmlOptions' => array('style' => "text-align:center;"),
                    ),
                    array(
                        'name' => 'summary',
                        'type' => 'raw',
                        'value' => '$data->summary',
                        'htmlOptions' => array('style' => "text-align:center;", 'title' => 'Summary'),
                    ),
                    array(
                        'name' => 'status',
                        'type' => 'raw',
                        'value' => '$data->status0->title',
                        'filter' => CHtml::activeDropDownList($model, 'status', CHtml::listData(SroStatus::model()->findAll(array('condition' => '', 'order' => 'title')), 'id', 'title'), array('empty' => 'All', 'class' => 'select2')),
                        'htmlOptions' => array('style' => "text-align:center;", 'title' => 'Status'),
                    ),
                    array(
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                    ),
                ),
            ));
            ?>
        </div><!--/.widget-box -->
