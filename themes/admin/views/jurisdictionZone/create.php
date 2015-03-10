<?php
/* @var $this JurisdictionZoneController */
/* @var $model JurisdictionZone */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Zones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionZone', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionZone', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionZone</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>