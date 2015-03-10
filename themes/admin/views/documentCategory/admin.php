<?php
$this->pageTitle = 'Document categories - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Document Categories' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('document-category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Document Categories</h5>
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
                'id' => 'document-category-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'parent',
                        'type' => 'raw',
                        'value' => 'DocumentCategory::getCategoryName($data->parent)',
                        'filter' => DocumentCategory::get_category_new('DocumentCategory', 'parent'),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Document Category'),
                    ),
                    array(
                        'name' => 'title',
                        'type' => 'raw',
                        'value' => '$data->title',
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
                    ),
                    array(
                        'name' => 'published',
                        'value' => '$data->published?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
                        'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                        'htmlOptions' => array('style' => "text-align:center; width:100px;"),
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