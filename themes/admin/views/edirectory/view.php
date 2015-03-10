<?php
/* @var $this EdirectoryController */
/* @var $model Edirectory */
?>

<?php
$this->pageTitle = 'Directory details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Directories' => array('admin'),
    $model->title,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details Directory (<?php echo $model->title; ?>)</h5>
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
                        'name' => 'category',
                        'type' => 'raw',
                        'value' => DirectoryCategory::getDirectoryCategory($model->category),
                    ),
                    'title',
                    'address',
                    'postcode',                    
                    array(
                        'name' => 'country',
                        'type' => 'raw',
                        'value' => Country::getCountry($model->country),
                    ),
                    array(
                        'name' => 'state',
                        'type' => 'raw',
                        'value' => State::getState($model->state),
                    ),
                    array(
                        'name' => 'city',
                        'type' => 'raw',
                        'value' => City::getCity($model->city),
                    ),
                    array(
                        'name' => 'district',
                        'type' => 'raw',
                        'value' => District::getDistrict($model->district),
                    ),
                    array(
                        'name' => 'thana',
                        'type' => 'raw',
                        'value' => Thana::getThana($model->thana),
                    ),
                    'telephone',
                    'mobile',
                    'email',
                    'fax',
                    'website',
                    'details',
                    array(
                        'name' => 'created_by',
                        'type' => 'raw',
                        'value' => UserAdmin::get_user_name($model->created_by),
                    ),
                    array(
                        'name' => 'created_on',
                        'type' => 'raw',
                        'value' => UserAdmin::get_date_time($model->created_on),
                    ),
                    array(
                        'name' => 'modified_by',
                        'type' => 'raw',
                        'value' => UserAdmin::get_user_name($model->modified_by),
                    ),
                    array(
                        'name' => 'modified_on',
                        'type' => 'raw',
                        'value' => UserAdmin::get_date_time($model->modified_on),
                    ),
                    array(
                        'name' => 'published',
                        'value' => $model->published ? "Yes" : "No",
                    ),
                    'hits',
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->