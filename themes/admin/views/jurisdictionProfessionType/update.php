<?php
/* @var $this JurisdictionProfessionTypeController */
/* @var $model JurisdictionProfessionType */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Profession Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionProfessionType', 'url'=>array('index')),
	array('label'=>'Create JurisdictionProfessionType', 'url'=>array('create')),
	array('label'=>'View JurisdictionProfessionType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionProfessionType', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionProfessionType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>