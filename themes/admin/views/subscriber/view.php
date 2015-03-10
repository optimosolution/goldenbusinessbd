<?php
$this->pageTitle = 'Subscriber details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Subscribers' => array('admin'),
    $model->email,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details Subscriber (<?php echo $model->email; ?>)</h5>
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
                    'full_name',
                    'email',
                    'user_id',
                    array(
                        'name' => 'created_on',
                        'type' => 'raw',
                        'value' => date("F j, Y, g:i A", strtotime($model->created_on)),
                    ),
                    array(
                        'name' => 'confirmed',
                        'value' => $model->confirmed ? "Yes" : "No",
                    ),
                    array(
                        'name' => 'enabled',
                        'value' => $model->enabled ? "Yes" : "No",
                    ),
                    array(
                        'name' => 'accept',
                        'value' => $model->accept ? "Yes" : "No",
                    ),
                    'key',
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->