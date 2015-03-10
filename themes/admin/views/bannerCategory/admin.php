<?php
$this->pageTitle = 'Banner Categories - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Banner Categories' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('banner-category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Banner Categories</h5>
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
                'id' => 'banner-category-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'parent_id',
                        'type' => 'raw',
                        'value' => 'getCategoryName($data->parent_id)',
                        'filter' => BannerCategory::get_category_new('BannerCategory', 'parent_id'),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Parent Category'),
                    ),
                    'title',
                    array(
                        'name' => 'description',
                        'type' => 'raw',
                        'value' => '$data->description',
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Description'),
                    ),
                    array(
                        'name' => 'published',
                        'header' => "Status",
                        'value' => '$data->published?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
                        'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
                        'htmlOptions' => array('style' => "text-align:center;"),
                    ),
                    array(
                        'header' => 'Actions',
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                    ),
                ),
            ));

            /**
             * Retrieves Category name by ID.
             * @return string.
             */
            function getCategoryName($id) {
                $returnValue = Yii::app()->db->createCommand()
                        ->select('title')
                        ->from('{{banner_category}}')
                        ->where('id=:id', array(':id' => $id))
                        ->queryScalar();
                if ($returnValue <= '0') {
                    $returnValue = 'No parent!';
                } else {
                    $returnValue = $returnValue;
                }
                return $returnValue;
            }
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->
