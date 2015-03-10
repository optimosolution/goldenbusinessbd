<?php
/* @var $this JurisdictionCompanyController */
/* @var $model JurisdictionCompany */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Companies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionCompany', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionCompany', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionCompany</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>