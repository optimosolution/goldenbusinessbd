<?php
/* @var $this JurisdictionCircleController */
/* @var $model JurisdictionCircle */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Circles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JurisdictionCircle', 'url'=>array('index')),
	array('label'=>'Manage JurisdictionCircle', 'url'=>array('admin')),
);
?>

<h1>Create JurisdictionCircle</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>