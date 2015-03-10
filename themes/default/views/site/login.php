<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = 'Login - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Login',
);
?>
<h1>Login</h1>
<div class="row">
    <div class="col-md-8 col-md-push-4">
        <div class="form">
            <?php
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'login-form',
                'enableClientValidation' => true,
                'htmlOptions' => array('class' => 'well'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
            ?>
            <div class="row">
                <div class="col-sm-2">
                    <?php echo $form->labelEx($model, 'username'); ?>
                </div>
                <div class="col-sm-4">           
                    <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 50, 'class' => 'form-control', 'placeholder' => 'Username')); ?>
                </div>        
            </div>
            <br />
            <div class="row">
                <div class="col-sm-2">
                    <?php echo $form->labelEx($model, 'password'); ?>
                </div>
                <div class="col-sm-4">           
                    <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 50, 'class' => 'form-control', 'placeholder' => 'Password')); ?>
                </div>        
            </div>
            <br />
            <div class="row">
                <div class="col-sm-2">            
                </div>
                <div class="col-sm-4">           
                    <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary pull-right')); ?>
                </div>        
            </div> 
            <?php $this->endWidget(); ?>
        </div>
    </div> <!-- col-md-8 -->
    <div class="col-md-4 col-md-pull-8">
        <aside class="sidebar">
            <div class="block">
                <?php
                $this->widget('application.extensions.fbLikeBox.fbLikeBox', array(
                    'likebox' => array(
                        'url' => 'https://facebook.com/GoldenBangladesh',
                        'header' => 'true',
                        'width' => '360',
                        'height' => '500',
                        'layout' => 'light',
                        'show_post' => 'false',
                        'show_faces' => 'true',
                        'show_border' => 'true',
                    )
                ));
                ?>
            </div>            
        </aside> <!-- Sidebar -->
    </div> 
</div>