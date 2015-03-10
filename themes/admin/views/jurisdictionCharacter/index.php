<?php
/* @var $this JurisdictionCharacterController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Characters',
);

$this->menu=array(
	array('label'=>'Create JurisdictionCharacter','url'=>array('create')),
	array('label'=>'Manage JurisdictionCharacter','url'=>array('admin')),
);
?>

<h1>Jurisdiction Characters</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>