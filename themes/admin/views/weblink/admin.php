<?php
$this->pageTitle = 'Weblinks - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Weblinks' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('weblink-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Weblinks</h5>
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
                'id' => 'weblink-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'category_id',
                        'type' => 'raw',
                        'value' => 'getCategoryName($data->category_id)',
                        'filter' => CHtml::activeDropDownList($model, 'category_id', CHtml::listData(WeblinkCategory::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Category'),
                    ),
                    'title',
                    'click_url',
                    'hits',
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

            function getCategoryName($id) {
                $returnValue = Yii::app()->db->createCommand()
                        ->select('title')
                        ->from('{{weblink_category}}')
                        ->where('id=:id', array(':id' => $id))
                        ->queryScalar();
                if ($returnValue <= '0') {
                    $returnValue = 'No set!';
                } else {
                    $returnValue = $returnValue;
                }
                return $returnValue;
            }
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->
