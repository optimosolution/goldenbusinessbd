<?php
/* @var $this EdirectoryController */
/* @var $model Edirectory */

$this->breadcrumbs=array(
	'Edirectories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Edirectory', 'url'=>array('index')),
	array('label'=>'Manage Edirectory', 'url'=>array('admin')),
);
?>

<h1>Create Edirectory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>