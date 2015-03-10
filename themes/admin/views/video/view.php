<?php
/* @var $this VideoController */
/* @var $model Video */
?>

<?php
$this->pageTitle = 'Video details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Videos' => array('admin'),
    $model->youtube_id,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details User Group (<?php echo $model->youtube_id; ?>)</h5>
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
            $this->widget('zii.widgets.CDetailView', array(
                'htmlOptions' => array(
                    'class' => 'table table-striped table-condensed table-hover',
                ),
                'data' => $model,
                'attributes' => array(
                    'id',
                    'youtube_id',
                    array(
                        'name' => 'published',
                        'value' => $model->published ? "Yes" : "No",
                    ),
                    array(
                        'name' => 'created_on',
                        'type' => 'raw',
                        'value' => date("F j, Y, g:i A", strtotime($model->created_on)),
                    ),
                    array(
                        'name' => 'created_by',
                        'type' => 'raw',
                        'value' => UserAdmin::get_name($model->created_by),
                    ),
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


