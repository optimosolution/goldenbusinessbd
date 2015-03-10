<?php
/* @var $this JurisdictionDistrictController */
/* @var $model JurisdictionDistrict */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Districts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionDistrict', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionDistrict', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionDistrict</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>