<?php
$this->breadcrumbs = array(
    'Acls' => array('admin'),
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
	$.fn.yiiGridView.update('acl-grid', {
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
    'id' => 'acl-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'group_id',
            'type' => 'raw',
            'filter' => CHtml::activeDropDownList($model, 'group_id', CHtml::listData(UserGroup::model()->findAll(array("order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'value' => 'getGroupName($data->group_id)',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Group'),
        ),
        array(
            'name' => 'controller',
            'type' => 'raw',
            'value' => '$data->controller',            
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Controller'),
        ),
        array(
            'name' => 'action_title',
            'type' => 'raw',
            'value' => '$data->action_title',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
        ),
        'actions',
        array(
            'name' => 'access',
            'value' => '$data->access?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'htmlOptions' => array('style' => "text-align:left;"),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));

/**
 * Retrieves Group name by ID.
 * @return string.
 */
function getGroupName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('title')
            ->from('{{user_group}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}
?>
