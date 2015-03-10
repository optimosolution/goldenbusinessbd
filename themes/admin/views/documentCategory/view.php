<?php
$this->pageTitle = 'Document category details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Document Categories' => array('admin'),
    $model->title,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details Document Category (<?php echo $model->title; ?>)</h5>
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
                        'name' => 'parent',
                        'type' => 'raw',
                        'value' => DocumentCategory::getCategoryName($model->parent),
                    ),
                    'title',
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
                        'name' => 'created_by',
                        'type' => 'raw',
                        'value' => $this->getUserNameByID($model->created_by),
                    ),
                    array(
                        'name' => 'created_time',
                        'type' => 'raw',
                        'value' => UserAdmin::get_date_time($model->created_time),
                    ),
                    array(
                        'name' => 'modified_by',
                        'type' => 'raw',
                        'value' => $this->getUserNameByID($model->modified_by),
                    ),
                    array(
                        'name' => 'modified_time',
                        'type' => 'raw',
                        'value' => UserAdmin::get_date_time($model->modified_time),
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->