<?php
/* @var $this UserController */
/* @var $model User */
$this->pageTitle = $model->name . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->name,
);
?>
<h1><?php echo $model->name; ?></h1>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'name',
        'email',
    ),
));
?>
