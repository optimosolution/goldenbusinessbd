<?php
/* @var $this JurisdictionServiceController */
/* @var $model JurisdictionService */
?>

<?php
$this->pageTitle = 'Services details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Services' => array('admin'),
    $model->assessee,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details Services</h5>
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
                    array(
                        'name' => 'district_id',
                        'type' => 'raw',
                        'value' => $model->district->taxes_area,
                    ),
                    array(
                        'name' => 'employer_id',
                        'type' => 'raw',
                        'value' => $model->employer->tax_employer,
                    ),
                    array(
                        'name' => 'character_id',
                        'type' => 'raw',
                        'value' => JurisdictionCharacter::get_title($model->character_id),
                    ),
                    'assessee',
                    array(
                        'name' => 'zone',
                        'type' => 'raw',
                        'value' => $model->zone0->tax_taxes_zone,
                    ),
                    array(
                        'name' => 'circle',
                        'type' => 'raw',
                        'value' => $model->circle0->tax_taxes_circle,
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->