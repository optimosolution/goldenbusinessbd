<?php
/* @var $this JurisdictionCompanyTypeController */
/* @var $model JurisdictionCompanyType */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Company Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionCompanyType', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionCompanyType', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionCompanyType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>