<?php
/* @var $this JurisdictionCharacterController */
/* @var $model JurisdictionCharacter */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Characters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionCharacter', 'url'=>array('index')),
	array('label'=>'Create JurisdictionCharacter', 'url'=>array('create')),
	array('label'=>'View JurisdictionCharacter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionCharacter', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionCharacter <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>