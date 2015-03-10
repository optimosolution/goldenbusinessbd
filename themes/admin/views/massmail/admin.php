<?php
/* @var $this MassmailController */
/* @var $model Massmail */

$this->pageTitle = 'Mass Mail - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Mass Mail' => array('admin'),
    'Manage',
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Mass Mail</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create'), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <?php
            $this->widget('bootstrap.widgets.TbGridView', array(
                'id' => 'massmail-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'user_group',
                        'type' => 'raw',
                        'value' => 'UserGroup::get_user_group($data->user_group)',
                        'filter' => CHtml::activeDropDownList($model, 'user_group', CHtml::listData(UserGroup::model()->findAll(array("order" => "title")), 'id', 'title'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'User Group'),
                    ),
                    array(
                        'name' => 'user_status',
                        'type' => 'raw',
                        'value' => 'UserStatus::get_user_status($data->user_status)',
                        'filter' => CHtml::activeDropDownList($model, 'user_status', CHtml::listData(UserStatus::model()->findAll(array("order" => "status")), 'id', 'status'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'User Status'),
                    ),
                    'subject',
                    array(
                        'header' => 'Send',
                        'type' => 'raw',
                        'value' => 'Massmail::get_mail_send($data->id)',
                        'htmlOptions' => array('style' => "text-align:right;width:70px;", 'title' => 'Send mail!'),
                    ),
                    array(
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->