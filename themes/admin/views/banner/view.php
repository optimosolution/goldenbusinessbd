<?php
$this->pageTitle = 'Banner details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Banners' => array('admin'),
    $model->name,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details Banner (<?php echo $model->name; ?>)</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-pencil"></i>', array('update', 'id' => $model->id), array('data-rel' => 'tooltip', 'title' => 'Edit', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create'), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <?php
            $this->widget('bootstrap.widgets.TbDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'id',
                    array(
                        'name' => 'catid',
                        'type' => 'raw',
                        'value' => Banner:: getCategoryName($model->catid),
                    ),
                    'name',
                    'alias',
                    array(
                        'name' => 'banner',
                        'type' => 'raw',
                        'value' => CHtml::image('uploads/banners/' . $model->banner),
                    ),
                    'clickurl',
                    array(
                        'name' => 'description',
                        'type' => 'raw',
                        'value' => $model->description,
                        'htmlOptions' => array('style' => "text-align:left;"),
                    ),
                    array(
                        'name' => 'published',
                        'value' => $model->published ? "Yes" : "No",
                    ),
                    array(
                        'name' => 'sticky',
                        'value' => $model->published ? "Yes" : "No",
                    ),
                    'ordering',
                    array(
                        'name' => 'created_on',
                        'value' => UserAdmin::get_date_time($model->created_on),
                    ),
                    array(
                        'name' => 'created_by',
                        'type' => 'raw',
                        'value' => Banner:: getUserName($model->created_by),
                    ),
                    array(
                        'name' => 'publish_up',
                        'value' => UserAdmin::get_date_time($model->publish_up),
                    ),
                    array(
                        'name' => 'publish_down',
                        'value' => UserAdmin::get_date_time($model->publish_down),
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->