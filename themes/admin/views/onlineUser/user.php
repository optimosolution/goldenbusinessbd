<?php
$this->pageTitle = "Online Users - " . Yii::app()->name;
$this->breadcrumbs = array(
    'Online Users' => array('admin'),
    'Manage',
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Online Site Users</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <?php
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type' => TbHtml::GRID_TYPE_HOVER,
                'id' => 'user-group-grid',
                'dataProvider' => $model->search_user(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'header' => 'Name',
                        'name' => 'userId',
                        'type' => 'raw',
                        'value' => 'CHtml::link(CHtml::encode(UserAdmin::get_user_name($data->userId)), array("/userAdmin/view","id"=>$data->userId))',
                        'filter' => CHtml::activeDropDownList($model, 'userId', CHtml::listData(UserAdmin::model()->findAll(array('condition' => '', "order" => "name")), 'id', 'name'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Full Name'),
                    ),
                    array(
                        'name' => 'expire',
                        'type' => 'raw',
                        'value' => 'AuditTrail::returnInterval(OnlineUser::get_ts_time($data->expire),OnlineUser::get_current_time())',
                    ),
                    array(
                        'header' => 'Shut down',
                        'type' => 'raw',
                        'value' => 'OnlineUser::shut_down($data->userId)',
                        'htmlOptions' => array('style' => "text-align:center;width:100px;"),
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->
