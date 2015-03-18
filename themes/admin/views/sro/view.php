<?php
/* @var $this SroController */
/* @var $model Sro */
?>

<?php
$this->pageTitle = 'SRO details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Sros' => array('admin'),
    $model->sl_no,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details Companies</h5>
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
                    array(
                        'name' => 'sro_type',
                        'type' => 'raw',
                        'value' => $model->sroType->title,
                    ),
                    'sl_no',
                    'sro_no',
                    'sro_date',
                    array(
                        'name' => 'summary',
                        'type' => 'raw',
                        'value' => $model->summary,
                    ),
                    array(
                        'name' => 'description',
                        'type' => 'raw',
                        'value' => $model->description,
                    ),
                    array(
                        'name' => 'note',
                        'type' => 'raw',
                        'value' => $model->note,
                    ),
                    'attach_file',
                    array(
                        'name' => 'status',
                        'type' => 'raw',
                        'value' => $model->status0->title,
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->