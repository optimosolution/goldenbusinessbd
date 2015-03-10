<?php
/* @var $this ContentController */
/* @var $model Content */
$this->pageTitle = 'New article - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Contents' => array('admin'),
    'Create',
);
?>

<h1>New Article</h1>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div> <!-- col-md-8 --> 
</div>