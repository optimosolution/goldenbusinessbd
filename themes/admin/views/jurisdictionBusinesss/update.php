<?php
/* @var $this JurisdictionBusinesssController */
/* @var $model JurisdictionBusinesss */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Businessses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionBusinesss', 'url'=>array('index')),
	array('label'=>'Create JurisdictionBusinesss', 'url'=>array('create')),
	array('label'=>'View JurisdictionBusinesss', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionBusinesss', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionBusinesss <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>