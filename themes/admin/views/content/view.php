<?php
$this->pageTitle = 'Content details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Contents' => array('admin'),
    $model->title,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details Content (<?php echo $model->title; ?>)</h5>
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
                    'title',
                    'alias',
                    array(
                        'name' => 'profile_picture',
                        'type' => 'raw',
                        'value' => CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $model->profile_picture),
                    ),
                    array(
                        'name' => 'introtext',
                        'type' => 'raw',
                        'value' => $model->introtext,
                        'htmlOptions' => array('style' => "text-align:left;"),
                    ),
                    array(
                        'name' => 'fulltext',
                        'type' => 'raw',
                        'value' => $model->fulltext,
                        'htmlOptions' => array('style' => "text-align:left;"),
                    ),
                    array(
                        'name' => 'state',
                        'value' => $model->state ? "Yes" : "No",
                    ),
                    array(
                        'name' => 'catid',
                        'type' => 'raw',
                        'value' => ContentCategory::getCategoryName($model->catid),
                    ),
                    array(
                        'name' => 'created_by',
                        'type' => 'raw',
                        'value' => UserAdmin::get_name($model->created_by),
                    ),
                    array(
                        'name' => 'created',
                        'type' => 'raw',
                        'value' => UserAdmin::get_date_time($model->created),
                    ),
                    array(
                        'name' => 'modified_by',
                        'type' => 'raw',
                        'value' => $model->getUserName($model->modified_by),
                    ),
                    array(
                        'name' => 'modified',
                        'type' => 'raw',
                        'value' => UserAdmin::get_date_time($model->modified),
                    ),
                    array(
                        'name' => 'publish_up',
                        'type' => 'raw',
                        'value' => UserAdmin::get_date_time($model->publish_up),
                    ),
                    array(
                        'name' => 'publish_down',
                        'type' => 'raw',
                        'value' => UserAdmin::get_date_time($model->publish_down),
                    ),
                    'ordering',
                    'metakey',
                    'metadesc',
                    'hits',
                    array(
                        'name' => 'featured',
                        'value' => $model->featured ? "Yes" : "No",
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->