<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->pageTitle = 'Manage Menus - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Menus' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#menu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Menus</h5>
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
                'id' => 'menu-grid',
                'type' => TbHtml::GRID_TYPE_HOVER,
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'parent',
                        'type' => 'raw',
                        'filter' => Menu::get_menu_new(),
                        'value' => 'Menu::get_menu_title($data->parent)',
                        'htmlOptions' => array('style' => "text-align:left;width:250px;", 'title' => 'Parent'),
                    ),
                    'title',
                    'controller',
                    'url',
                    'icon',
                    array(
                        'name' => 'ordering',
                        'type' => 'raw',
                        'value' => '$data->ordering',
                        'htmlOptions' => array('style' => "text-align:center;width:50px;", 'title' => 'Ordering'),
                    ),
                    array(
                        'name' => 'status',
                        'value' => '$data->status?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
                        'filter' => CHtml::activeDropDownList($model, 'status', array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')), array('style' => 'width:100px')),
                        'htmlOptions' => array('style' => "text-align:center;width:80px;"),
                    ),
                    array(
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->