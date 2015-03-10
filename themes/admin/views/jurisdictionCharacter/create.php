<?php
/* @var $this JurisdictionCharacterController */
/* @var $model JurisdictionCharacter */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Characters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionCharacter', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionCharacter', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionCharacter</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>