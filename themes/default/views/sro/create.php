<?php
/* @var $this SroController */
/* @var $model Sro */

$this->breadcrumbs=array(
	'Sros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sro', 'url'=>array('index')),
	array('label'=>'Manage Sro', 'url'=>array('admin')),
);
?>

<h1>Create Sro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>