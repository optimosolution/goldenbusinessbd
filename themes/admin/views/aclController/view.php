<?php
$this->pageTitle = 'Controller details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Controllers' => array('admin'),
    $model->controller,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details Controller (<?php echo $model->controller; ?>)</h5>
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
		<div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-exchange"></i>', array('aclAction/actions', 'cid' => $model->id), array('data-rel' => 'tooltip', 'title' => 'Actions', 'data-placement' => 'bottom')); ?>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <?php
            $this->widget('bootstrap.widgets.TbDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'id',
                    'controller',
                    array(
                        'name' => 'controller_type',
                        'value' => $model->controller_type ? "Backend" : "Frontend",
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->