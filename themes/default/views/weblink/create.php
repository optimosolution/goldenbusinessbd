<?php
/* @var $this WeblinkController */
/* @var $model Weblink */

$this->breadcrumbs=array(
	'Weblinks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Weblink', 'url'=>array('index')),
	array('label'=>'Manage Weblink', 'url'=>array('admin')),
);
?>

<h1>Create Weblink</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>