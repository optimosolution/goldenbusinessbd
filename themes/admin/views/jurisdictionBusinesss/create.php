<?php
/* @var $this JurisdictionBusinesssController */
/* @var $model JurisdictionBusinesss */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Businessses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionBusinesss', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionBusinesss', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionBusinesss</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>