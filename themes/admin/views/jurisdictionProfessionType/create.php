<?php
/* @var $this JurisdictionProfessionTypeController */
/* @var $model JurisdictionProfessionType */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Profession Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionProfessionType', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionProfessionType', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionProfessionType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>