<?php
/* @var $this SroController */
/* @var $model Sro */

$this->breadcrumbs=array(
	'Sros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sro', 'url'=>array('index')),
	array('label'=>'Create Sro', 'url'=>array('create')),
	array('label'=>'View Sro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sro', 'url'=>array('admin')),
);
?>

<h1>Update Sro <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>