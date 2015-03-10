<?php
/* @var $this JurisdictionZoneController */
/* @var $model JurisdictionZone */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Zones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionZone', 'url'=>array('index')),
	array('label'=>'Create JurisdictionZone', 'url'=>array('create')),
	array('label'=>'View JurisdictionZone', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionZone', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionZone <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>