<?php
$this->breadcrumbs = array(
    'Acls' => array('admin'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
?>

<div class="form-actions">
    <h2><?php echo $model->group_id; ?>/<?php echo $model->controller; ?>/<?php echo $model->actions; ?></h2>
</div>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'name' => 'group_id',
            'type' => 'raw',
            'value' => $model->getGroupName($model->group_id),
        ),
        'controller',
        'actions',
        array(
            'name' => 'access',
            'value' => $model->access ? "Yes" : "No",
        ),
    ),
));
?>
