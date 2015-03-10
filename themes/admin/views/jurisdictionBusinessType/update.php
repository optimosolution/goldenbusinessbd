<?php
/* @var $this JurisdictionBusinessTypeController */
/* @var $model JurisdictionBusinessType */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Business Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionBusinessType', 'url'=>array('index')),
	array('label'=>'Create JurisdictionBusinessType', 'url'=>array('create')),
	array('label'=>'View JurisdictionBusinessType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionBusinessType', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionBusinessType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>