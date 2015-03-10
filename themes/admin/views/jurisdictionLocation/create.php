<?php
/* @var $this JurisdictionLocationController */
/* @var $model JurisdictionLocation */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Locations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionLocation', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionLocation', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionLocation</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>