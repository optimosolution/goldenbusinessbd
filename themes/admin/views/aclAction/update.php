<?php
$this->pageTitle = 'Edit ACL action - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'ACL Actions' => array('actions', 'cid' => $_GET['cid']),
    AclController::get_controller($_GET['cid']) . ' - Update',
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Edit Action (<?php echo $model->action; ?>)</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-eye-open"></i>', array('view', 'id' => $model->id, 'cid' => $_GET['cid']), array('data-rel' => 'tooltip', 'title' => 'Details', 'data-placement' => 'bottom')); ?>
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
            <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->