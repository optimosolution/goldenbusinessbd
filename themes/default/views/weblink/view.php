<?php
/* @var $this WeblinkController */
/* @var $model Weblink */

$this->breadcrumbs=array(
	'Weblinks'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Weblink', 'url'=>array('index')),
	array('label'=>'Create Weblink', 'url'=>array('create')),
	array('label'=>'Update Weblink', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Weblink', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Weblink', 'url'=>array('admin')),
);
?>

<h1>View Weblink #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'title',
		'description',
		'click_url',
		'created_on',
		'created_by',
		'hits',
		'published',
	),
)); ?>
