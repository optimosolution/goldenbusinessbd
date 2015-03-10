<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = 'Login - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Login',
);
?>
<div class="login-container">
    <div class="row-fluid">
        <div class="center">
            <h1>
                <i class="icon-cloud green"></i>
                <span class="red">Admin</span>
                <span class="white">Login</span>
            </h1>
            <h4 class="blue">&copy; <?php echo Yii::app()->name; ?></h4>
        </div>
    </div>
    <div class="space-6"></div>
    <div class="row-fluid">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'login-form',
            'enableAjaxValidation' => false,
        ));
        ?>
        <div class="position-relative">
            <div id="login-box" class="login-box visible widget-box no-border">
                <div class="widget-body">
                    <div class="widget-main">
                        <h4 class="header blue lighter bigger">
                            <i class="icon-lock green"></i>
                            Please Enter Your Information
                        </h4>
                        <div class="space-6"></div>                        
                        <fieldset>
                            <label>
                                <span class="block input-icon input-icon-right">
                                    <?php echo $form->textFieldControlGroup($model, 'username', array('class' => 'span12', 'placeholder' => 'Username / E-mail', 'label' => false)); ?>
                                    <i class="icon-user"></i>
                                </span>
                            </label>
                            <label>
                                <span class="block input-icon input-icon-right">
                                    <?php echo $form->passwordFieldControlGroup($model, 'password', array('class' => 'span12', 'placeholder' => 'Password', 'label' => false)); ?>
                                    <i class="icon-lock"></i>
                                </span>
                            </label>
                            <div class="space"></div>
                            <div class="clearfix">
                                <label class="inline span12">
                                    <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'ace')); ?>
                                    <span class="lbl"> <?php echo $form->label($model, 'rememberMe', array('style' => 'display:inline;')); ?></span>
                                </label>                                
                            </div>
                            <div class="space-4"></div>
                        </fieldset>                        
                    </div><!-- /widget-main -->
                    <div class="toolbar clearfix">
                        <div class="row-fluid">
                            <div class="span2"></div>
                            <div class="span5">
                                <?php echo TbHtml::submitButton('Login', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_DEFAULT,)); ?>
                            </div>   
                            <div class="span5">
                                <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_DEFAULT, 'size' => TbHtml::BUTTON_SIZE_DEFAULT,)); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- /widget-body -->
            </div><!-- /login-box -->
        </div><!-- /position-relative -->
        <?php $this->endWidget(); ?>
    </div>
</div>