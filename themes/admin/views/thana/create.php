<?php
/* @var $this ThanaController */
/* @var $model Thana */
?>

<?php
$this->pageTitle = 'New thana - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Thanas' => array('admin'),
    'Create',
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>New Thana</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->