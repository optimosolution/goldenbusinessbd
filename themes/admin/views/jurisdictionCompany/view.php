<?php
/* @var $this JurisdictionCompanyController */
/* @var $model JurisdictionCompany */
?>

<?php
$this->pageTitle = 'Companies details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Companies' => array('admin'),
    $model->id,
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
                    'id',
                    array(
                        'name' => 'income_source',
                        'type' => 'raw',
                        'value' => $model->incomeSource->title,
                    ),
                    array(
                        'name' => 'district',
                        'type' => 'raw',
                        'value' => $model->district0->taxes_area,
                    ),
                    array(
                        'name' => 'company_type',
                        'type' => 'raw',
                        'value' => $model->companyType->title,
                    ),
                    'letter_specific_name',
                    array(
                        'name' => 'zone',
                        'type' => 'raw',
                        'value' => $model->zone0->tax_taxes_zone,
                    ),
                    array(
                        'name' => 'range',
                        'type' => 'raw',
                        'value' => JurisdictionRange::get_title($model->range),
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