<?php
/* @var $this WeblinkController */
/* @var $model Weblink */

$this->breadcrumbs=array(
	'Weblinks'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Weblink', 'url'=>array('index')),
	array('label'=>'Create Weblink', 'url'=>array('create')),
	array('label'=>'View Weblink', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Weblink', 'url'=>array('admin')),
);
?>

<h1>Update Weblink <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>