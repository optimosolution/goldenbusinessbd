<?php
$this->pageTitle = 'Controllers - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Controllers' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('acl-controller-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Controllers</h5>
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
                'id' => 'acl-controller-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'controller',
                        'type' => 'raw',
                        'value' => 'CHtml::link(CHtml::encode($data->controller), array("aclAction/actions","cid"=>$data->id))',
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Acceass'),
                    ),
                    array(
                        'name' => 'title',
                        'type' => 'raw',
                        'value' => 'CHtml::link(CHtml::encode($data->title), array("aclAction/actions","cid"=>$data->id))',
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
                    ),
                    array(
                        'name' => 'controller_type',
                        'value' => '$data->controller_type?Yii::t(\'app\',\'Backend\'):Yii::t(\'app\', \'Frontend\')',
                        'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Frontend'), '1' => Yii::t('app', 'Backend')),
                        'htmlOptions' => array('style' => "text-align:left;"),
                    ),
                    array(
                        'name' => 'status',
                        'value' => '$data->status?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
                        'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
                        'htmlOptions' => array('style' => "text-align:center;"),
                    ),
                    array(
                        'header' => 'Actions',
                        'type' => 'raw',
                        'value' => 'AclController::get_actions($data->id)',
                        'htmlOptions' => array('style' => "text-align:right;width:70px;", 'title' => 'Manage controller actions!'),
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
