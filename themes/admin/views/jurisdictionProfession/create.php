<?php
/* @var $this JurisdictionProfessionController */
/* @var $model JurisdictionProfession */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Professions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionProfession', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionProfession', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionProfession</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>