<?php
$this->pageTitle = 'ACL Actions - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Acl Actions' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => '', 'class' => 'search-button', 'url' => '#', 'active' => true, 'icon' => 'icon-search search-button'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('acl-action-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => TbHtml::GRID_TYPE_HOVER,
    'id' => 'acl-action-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'controller_id',
            'type' => 'raw',
            'value' => 'getControllerName($data->controller_id)',
            'filter' => CHtml::activeDropDownList($model, 'controller_id', CHtml::listData(AclController::model()->findAll(array('condition' => '', "order" => "controller")), 'id', 'controller'), array('empty' => 'All')),
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
