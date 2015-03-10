<?php
/* @var $this EdirectoryController */
/* @var $model Edirectory */

$this->breadcrumbs=array(
	'Edirectories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Edirectory', 'url'=>array('index')),
	array('label'=>'Create Edirectory', 'url'=>array('create')),
	array('label'=>'View Edirectory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Edirectory', 'url'=>array('admin')),
);
?>

<h1>Update Edirectory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>