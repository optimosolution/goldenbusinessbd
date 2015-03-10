<?php
/* @var $this JurisdictionEmployerController */
/* @var $model JurisdictionEmployer */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Employers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionEmployer', 'url'=>array('index')),
	array('label'=>'Create JurisdictionEmployer', 'url'=>array('create')),
	array('label'=>'View JurisdictionEmployer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionEmployer', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionEmployer <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>