<?php
/* @var $this UserController */
/* @var $model User */
$this->pageTitle = 'Registration - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Users' => array('create'),
    'Create',
);
?>
<h1>Registration</h1>
<?php echo $this->renderPartial('_form', array('model' => $model, 'model_profile' => $model_profile)); ?>