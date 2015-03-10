<?php
/* @var $this JurisdictionDistrictController */
/* @var $model JurisdictionDistrict */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Districts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionDistrict', 'url'=>array('index')),
	array('label'=>'Create JurisdictionDistrict', 'url'=>array('create')),
	array('label'=>'View JurisdictionDistrict', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionDistrict', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionDistrict <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>