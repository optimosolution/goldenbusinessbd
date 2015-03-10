<?php
/* @var $this JurisdictionBusinessTypeController */
/* @var $model JurisdictionBusinessType */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Business Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionBusinessType', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionBusinessType', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionBusinessType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>