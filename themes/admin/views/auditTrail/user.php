<?php
/* @var $this AuditTrailController */
/* @var $model AuditTrail */
$this->pageTitle = 'Audit Trail Users - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Audit Trails Users' => array('admin'),
    'Manage',
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Audit Trail Users</h5>
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
                'id' => 'audit-trail-grid',
                'dataProvider' => $model->search_user(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'user_id',
                        'type' => 'raw',
                        'value' => 'CHtml::link(CHtml::encode(User::get_user_name($data->user_id)), array("/user/view","id"=>$data->user_id))',
                        'filter' => CHtml::activeDropDownList($model, 'user_id', CHtml::listData(User::model()->findAll(array('condition' => '', "order" => "name")), 'id', 'name'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;width:250px;", 'title' => 'Name'),
                    ),
                    array(
                        'name' => 'login_time',
                        'type' => 'raw',
                        'value' => 'AuditTrail::get_date_time($data->login_time)',
                        'htmlOptions' => array('style' => "text-align:left;width:250px;", 'title' => 'Login time'),
                    ),
                    array(
                        'name' => 'logout_time',
                        'type' => 'raw',
                        'value' => 'AuditTrail::get_date_time($data->logout_time)',
                        'htmlOptions' => array('style' => "text-align:left;width:250px;", 'title' => 'Logout time'),
                    ),
                    array(
                        'header' => 'Duration',
                        'type' => 'raw',
                        'value' => 'AuditTrail::returnInterval($data->login_time,$data->logout_time)',
                    ),
                    array(
                        'header' => 'Actions',
                        'template' => '{delete}',
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                        'htmlOptions' => array('style' => "text-align:center;width:80px;", 'title' => 'Actions',),
                    ),
                ),
            ));
            ?> 
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->               