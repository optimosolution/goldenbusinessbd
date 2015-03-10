<?php
/* @var $this JurisdictionLocationController */
/* @var $model JurisdictionLocation */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Locations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionLocation', 'url'=>array('index')),
	array('label'=>'Create JurisdictionLocation', 'url'=>array('create')),
	array('label'=>'View JurisdictionLocation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionLocation', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionLocation <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>