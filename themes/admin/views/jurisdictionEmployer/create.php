<?php
/* @var $this JurisdictionEmployerController */
/* @var $model JurisdictionEmployer */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Employers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionEmployer', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionEmployer', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionEmployer</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>