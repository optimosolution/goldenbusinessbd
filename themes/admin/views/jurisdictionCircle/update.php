<?php
/* @var $this JurisdictionCircleController */
/* @var $model JurisdictionCircle */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Circles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionCircle', 'url'=>array('index')),
	array('label'=>'Create JurisdictionCircle', 'url'=>array('create')),
	array('label'=>'View JurisdictionCircle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionCircle', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionCircle <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>