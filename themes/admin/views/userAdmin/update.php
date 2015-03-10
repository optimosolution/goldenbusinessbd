<?php
$this->pageTitle = 'Edit admin user - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Admin users' => array('admin'),
    $model->name => array('view', 'id' => $model->id),
    'Update',
);
Yii::app()->clientScript->registerScript('user', "
    $('#UserAdmin_profile_picture').ace_file_input({
        no_file: 'No photo ...',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false, //| true | large
        whitelist:'gif|png|jpg|jpeg'
        //blacklist:'exe|php'
        //onchange:''
        //
    });
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Edit Admin User (<?php echo $model->name; ?>)</h5>
        <div class="widget-toolbar">            
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">            
            <?php echo CHtml::link('<i class="icon-lock"></i>', array('edit', 'id' => $model->id), array('data-rel' => 'tooltip', 'title' => 'Change Password', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-eye-open"></i>', array('view', 'id' => $model->id), array('data-rel' => 'tooltip', 'title' => 'Details', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create'), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>            
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <?php $this->renderPartial('_form_update', array('model' => $model)); ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->