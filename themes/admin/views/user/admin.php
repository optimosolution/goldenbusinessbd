<?php
$this->pageTitle = 'Users - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Users' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-admin-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage User</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-search"></i>', '#', array('class' => 'search-button', 'data-rel' => 'tooltip', 'title' => 'Search', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create'), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>
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
                'id' => 'user-admin-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'header' => 'Photo',
                        'type' => 'raw',
                        'value' => 'CHtml::link(User::get_picture_grid($data->id), array("view","id"=>$data->id))',
                        'htmlOptions' => array('style' => "text-align:left;width:50px;", 'title' => 'Picture', 'class' => 'ace-thumbnails'),
                    ),
                    array(
                        'name' => 'name',
                        'type' => 'raw',
                        'value' => 'CHtml::link(CHtml::encode($data->name), array("view","id"=>$data->id))',
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Name'),
                    ),
                    'username',
                    array(
                        'name' => 'email',
                        'type' => 'raw',
                        'value' => 'CHtml::mailto(CHtml::encode($data->email), $email=CHtml::encode($data->name)." <".CHtml::encode($data->email).">")',
                        'htmlOptions' => array('style' => "text-align:left;", 'rel' => 'tooltip', 'data-original-title' => 'Email'),
                    ),
                    array(
                        'name' => 'registerDate',
                        'value' => 'UserAdmin::get_date($data->registerDate)',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model, 'attribute' => 'registerDate', 'htmlOptions' => array('id' => 'datepicker1', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
                        'htmlOptions' => array('style' => "text-align:center;"),
                    ),
                    array(
                        'header' => 'Group',
                        'name' => 'title',
                        'type' => 'raw',
                        'filter' => CHtml::activeDropDownList($model, 'group_id', CHtml::listData(UserGroup::model()->findAll(array("order" => "title")), 'id', 'title'), array('empty' => 'All')),
                        'value' => '$data->UserGroup->title',
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Group'),
                    ),
                    array(
                        'name' => 'status',
                        'type' => 'raw',
                        'filter' => CHtml::activeDropDownList($model, 'status', CHtml::listData(UserStatus::model()->findAll(array("order" => "status")), 'id', 'status'), array('empty' => 'All')),
                        'value' => '$data->UserStatus->status',
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Status'),
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
