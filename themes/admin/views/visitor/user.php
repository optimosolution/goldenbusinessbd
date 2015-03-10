<?php
$this->pageTitle = 'Frontend Visitors - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Frontend Visitors' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker1').datepicker();
    $('#datepicker2').datepicker();
}
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Frontend Visitors</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-trash"></i>', array('truncateuser'), array('data-rel' => 'tooltip', 'title' => 'Truncate User Data', 'data-placement' => 'bottom')); ?>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <?php
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type' => TbHtml::GRID_TYPE_HOVER,
                'id' => 'visitor-grid',
                'dataProvider' => $model->search_user(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'user_id',
                        'type' => 'raw',
                        'value' => 'CHtml::link(CHtml::encode(User::get_user_name($data->user_id)), array("/user/view","id"=>$data->user_id))',
                        'filter' => CHtml::activeDropDownList($model, 'user_id', CHtml::listData(User::model()->findAll(array('condition' => '', "order" => "name")), 'id', 'name'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;"),
                    ),
                    'user_name',
                    'page_title',
                    'page_link',
                    array(
                        'name' => 'server_time',
                        'value' => 'AuditTrail::get_date_time($data->server_time)',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model, 'attribute' => 'server_time', 'htmlOptions' => array('id' => 'datepicker2', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
                        'htmlOptions' => array('style' => "text-align:center;"),
                    ),
                    'browser',
                    'visitor_ip',
                    array(
                        'header' => 'Actions',
                        'template' => '{delete}',
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->