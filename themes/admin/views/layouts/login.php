<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- basic styles -->
        <?php Yii::app()->bootstrap->register(); ?>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font-awesome.min.css" />
        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font-awesome-ie7.min.css" />
        <![endif]-->
        <!-- page specific plugin styles -->
        <!-- fonts -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-fonts.css" />
        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-skins.min.css" />
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-ie.min.css" />
        <![endif]-->
        <!-- inline styles related to this page -->
        <!-- ace settings handler -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/ace-extra.min.js"></script>
    </head>
    <body class="login-layout">
        <div class="main-container container-fluid">
            <div class="main-content">
                <div class="row-fluid">
                    <div class="span12">
                        <?php echo $content; ?>
                    </div><!-- /.span -->
                </div><!-- /.row-fluid -->
            </div>
        </div><!-- /.main-container -->
        <!-- basic scripts -->
        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>
        <!-- <![endif]-->
        <!--[if IE]>
        <script type="text/javascript">
        window.jQuery || document.write("<script src='<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
        </script>
        <![endif]-->
        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <!-- page specific plugin scripts -->
        <!-- ace scripts -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/ace-elements.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/ace.min.js"></script>
        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            function show_box(id) {
                jQuery('.widget-box.visible').removeClass('visible');
                jQuery('#' + id).addClass('visible');
            }
        </script>
    </body>
</html>