<?php
$this->pageTitle = 'ACL Actions - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'ACL Actions' => array('actions', 'cid' => $_GET['cid']),
    getControllerName($_GET['cid']),
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Controller (<?php echo AclController::get_controller($_GET['cid']); ?>)</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create', 'cid' => $_GET['cid']), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-arrow-up"></i>', array('aclController/admin'), array('data-rel' => 'tooltip', 'title' => 'Controller', 'data-placement' => 'bottom')); ?>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <?php
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type' => TbHtml::GRID_TYPE_HOVER,
                'id' => 'acl-action-grid',
                'dataProvider' => $model->actions($_GET['cid']),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'controller_id',
                        'type' => 'raw',
                        'value' => 'getControllerName($data->controller_id)',
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Controller'),
                    ),
                    array(
                        'name' => 'title',
                        'type' => 'raw',
                        'value' => '$data->title',
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
                    ),
                    'action',
                    array(
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                        'template' => '{view}{update}{delete}',
                        'buttons' => array
                            (
                            'view' => array
                                (
                                'label' => 'View',
                                'url' => 'yii::app()->createUrl("aclAction/view", array("id"=>"$data->id","cid"=>"$_GET[cid]"))',
                                'options' => array('class' => 'view')
                            ),
                            'update' => array
                                (
                                'label' => 'Update',
                                'url' => 'yii::app()->createUrl("aclAction/update", array("id"=>"$data->id","cid"=>"$_GET[cid]"))',
                                'options' => array('class' => 'edit'),
                            ),
                            'delete' => array
                                (
                                'label' => 'Delete',
                                'url' => 'yii::app()->createUrl("aclAction/delete", array("id"=>"$data->id","cid"=>"$_GET[cid]"))',
                                'options' => array('class' => 'delete'),
                            ),
                        ),
                    ),
                ),
            ));

            /**
             * Retrieves Controller name by ID.
             * @return string.
             */
            function getControllerName($id) {
                $returnValue = Yii::app()->db->createCommand()
                        ->select('controller')
                        ->from('{{acl_controller}}')
                        ->where('id=:id', array(':id' => $id))
                        ->queryScalar();

                return $returnValue;
            }
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->
