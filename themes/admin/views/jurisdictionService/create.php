<?php
/* @var $this JurisdictionServiceController */
/* @var $model JurisdictionService */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionService', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionService', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionService</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>