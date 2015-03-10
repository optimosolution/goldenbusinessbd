<?php
/* @var $this JurisdictionCompanyTypeController */
/* @var $model JurisdictionCompanyType */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Company Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionCompanyType', 'url'=>array('index')),
	array('label'=>'Create JurisdictionCompanyType', 'url'=>array('create')),
	array('label'=>'View JurisdictionCompanyType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionCompanyType', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionCompanyType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>