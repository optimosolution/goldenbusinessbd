<?php
$this->pageTitle = 'Contents - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Contents' => array('admin'),
    'Manage',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('content-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Contents</h5>
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
                'type' => TbHtml::GRID_TYPE_HOVER,
                'id' => 'content-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'title',
                        'type' => 'raw',
                        'value' => '$data->title',
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
                    ),
                    array(
                        'name' => 'catid',
                        'type' => 'raw',
                        'value' => 'ContentCategory::getCategoryName($data->catid)',
                        'filter' => ContentCategory::get_category_new('Content', 'catid'),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Parent Category'),
                    ),
                    array(
                        'name' => 'state',
                        'value' => '$data->state?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
                        'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                        'htmlOptions' => array('style' => "text-align:center;"),
                    ),
                    array(
                        'name' => 'featured',
                        'value' => '$data->featured?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
                        'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                        'htmlOptions' => array('style' => "text-align:center;"),
                    ),
                    array(
                        'name' => 'created',
                        'value' => 'UserAdmin::get_date($data->created)',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model, 'attribute' => 'created', 'htmlOptions' => array('id' => 'datepicker2', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
                        'htmlOptions' => array('style' => "text-align:center;"),
                    ),
                    array(
                        'name' => 'ordering',
                        'type' => 'raw',
                        'value' => '$data->ordering',
                        'htmlOptions' => array('style' => "text-align:center; width:50px;", 'title' => 'Ordering'),
                    ),
                    array(
                        'name' => 'hits',
                        'type' => 'raw',
                        'value' => '$data->hits',
                        'htmlOptions' => array('style' => "text-align:center; width:50px;", 'title' => 'Hits'),
                    ),
                    array(
                        'header' => 'Actions',
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->
