<?php
/* @var $this DistrictController */
/* @var $model District */
?>

<?php
$this->pageTitle = 'District details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Districts' => array('admin'),
    $model->title,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details District (<?php echo $model->title; ?>)</h5>
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
                        'name' => 'country_id',
                        'type' => 'raw',
                        'value' => Country::getCountry($model->country_id),
                    ),
                    array(
                        'name' => 'state_id',
                        'type' => 'raw',
                        'value' => State::getState($model->state_id),
                    ),
                    array(
                        'name' => 'city_id',
                        'type' => 'raw',
                        'value' => City::getCity($model->city_id),
                    ),
                    'title',
                    array(
                        'name' => 'published',
                        'value' => $model->published ? "Yes" : "No",
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->