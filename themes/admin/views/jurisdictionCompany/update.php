<?php
/* @var $this JurisdictionCompanyController */
/* @var $model JurisdictionCompany */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Companies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionCompany', 'url'=>array('index')),
	array('label'=>'Create JurisdictionCompany', 'url'=>array('create')),
	array('label'=>'View JurisdictionCompany', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionCompany', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionCompany <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>