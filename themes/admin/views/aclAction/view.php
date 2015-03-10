<?php
$this->pageTitle = 'ACL action details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Acl Actions' => array('actions', 'cid' => $_GET['cid']),
    AclController::get_controller($_GET['cid']) . ' - Details',
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Action Details (<?php echo $model->action; ?>)</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-pencil"></i>', array('update', 'id' => $model->id, 'cid' => $_GET['cid']), array('data-rel' => 'tooltip', 'title' => 'Edit', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create', 'cid' => $_GET['cid']), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-home"></i>', array('actions', 'cid' => $_GET['cid']), array('data-rel' => 'tooltip', 'title' => 'Actions', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-arrow-up"></i>', array('aclController/admin'), array('data-rel' => 'tooltip', 'title' => 'Controller', 'data-placement' => 'bottom')); ?>
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
                        'name' => 'controller_id',
                        'type' => 'raw',
                        'value' => $model->getControllerName($model->controller_id),
                    ),
                    array(
                        'name' => 'title',
                        'type' => 'raw',
                        'value' => $model->title,
                    ),
                    'action',
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->