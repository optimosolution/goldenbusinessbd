<?php
/* @var $this JurisdictionServiceController */
/* @var $model JurisdictionService */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionService', 'url'=>array('index')),
	array('label'=>'Create JurisdictionService', 'url'=>array('create')),
	array('label'=>'View JurisdictionService', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionService', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionService <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>