<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="language" content="en" />
        <meta name="author" content="S.M. Saidur Rahman">
        <meta name="generator" content="Optimo Solution" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/favicon.ico" type="image/x-icon" />
        <!-- basic styles -->
        <?php Yii::app()->bootstrap->register(); ?>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font-awesome.min.css" />
        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font-awesome-ie7.min.css" />
        <![endif]-->
        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/jquery-ui-1.10.3.custom.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/jquery-ui-1.10.3.full.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/chosen.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/datepicker.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap-timepicker.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/daterangepicker.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/colorpicker.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/select2.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/jquery.gritter.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap-editable.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/colorbox.css" />
        <!-- fonts -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-fonts.css" />
        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-skins.min.css" />                
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-ie.min.css" />
        <![endif]-->
        <!-- inline styles related to this page -->
        <!-- ace settings handler -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/ace-extra.min.js"></script>        
    </head>
    <body>
        <div class="navbar" id="navbar">
            <script type="text/javascript">
                try {
                    ace.settings.check('navbar', 'fixed')
                } catch (e) {
                }
            </script>
            <div class="navbar-inner">
                <div class="container-fluid">
                    <?php
                    $logo = CHtml::image(Yii::app()->baseUrl . '/images/optimosolution_logo.png', Yii::app()->name, array('alt' => Yii::app()->name, 'class' => '', 'title' => Yii::app()->name, 'style' => 'height:23px;'));
                    echo CHtml::link($logo, array('site/index'), array('class' => 'brand', 'data-rel' => 'tooltip', 'title' => Yii::app()->name, 'data-placement' => 'right'));
                    ?>
                    <ul class="nav ace-nav pull-right">
                        <li class="grey">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-tasks"></i>
                                <span class="badge badge-grey">4</span>
                            </a>
                            <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
                                <li class="nav-header">
                                    <i class="icon-ok"></i>
                                    4 Tasks to complete
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Software Update</span>
                                            <span class="pull-right">65%</span>
                                        </div>

                                        <div class="progress progress-mini ">
                                            <div style="width:65%" class="bar"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Hardware Upgrade</span>
                                            <span class="pull-right">35%</span>
                                        </div>

                                        <div class="progress progress-mini progress-danger">
                                            <div style="width:35%" class="bar"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Unit Testing</span>
                                            <span class="pull-right">15%</span>
                                        </div>

                                        <div class="progress progress-mini progress-warning">
                                            <div style="width:15%" class="bar"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Bug Fixes</span>
                                            <span class="pull-right">90%</span>
                                        </div>

                                        <div class="progress progress-mini progress-success progress-striped active">
                                            <div style="width:90%" class="bar"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        See tasks with details
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="purple">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-bell-alt icon-animated-bell"></i>
                                <span class="badge badge-important">8</span>
                            </a>
                            <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
                                <li class="nav-header">
                                    <i class="icon-warning-sign"></i>
                                    8 Notifications
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-mini no-hover btn-pink icon-comment"></i>
                                                New Comments
                                            </span>
                                            <span class="pull-right badge badge-info">+12</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="btn btn-mini btn-primary icon-user"></i>
                                        Bob just signed up as an editor ...
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
                                                New Orders
                                            </span>
                                            <span class="pull-right badge badge-success">+8</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-mini no-hover btn-info icon-twitter"></i>
                                                Followers
                                            </span>
                                            <span class="pull-right badge badge-info">+11</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        See all notifications
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="green">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-envelope icon-animated-vertical"></i>
                                <span class="badge badge-success">5</span>
                            </a>
                            <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
                                <li class="nav-header">
                                    <i class="icon-envelope-alt"></i>
                                    5 Messages
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
                                        <span class="msg-body">
                                            <span class="msg-title">
                                                <span class="blue">Alex:</span>
                                                Ciao sociis natoque penatibus et auctor ...
                                            </span>

                                            <span class="msg-time">
                                                <i class="icon-time"></i>
                                                <span>a moment ago</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
                                        <span class="msg-body">
                                            <span class="msg-title">
                                                <span class="blue">Susan:</span>
                                                Vestibulum id ligula porta felis euismod ...
                                            </span>

                                            <span class="msg-time">
                                                <i class="icon-time"></i>
                                                <span>20 minutes ago</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
                                        <span class="msg-body">
                                            <span class="msg-title">
                                                <span class="blue">Bob:</span>
                                                Nullam quis risus eget urna mollis ornare ...
                                            </span>

                                            <span class="msg-time">
                                                <i class="icon-time"></i>
                                                <span>3:15 pm</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        See all messages
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <?php echo UserAdmin::get_profile_picture(Yii::app()->user->id); ?>
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php echo UserAdmin::get_name(Yii::app()->user->id); ?>
                                </span>
                                <i class="icon-caret-down"></i>
                            </a>
                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                                <li>
                                    <?php echo CHtml::link('<i class="icon-pencil"></i> Edit Profile', array('userAdmin/update', 'id' => Yii::app()->user->id)); ?>
                                </li>
                                <li>
                                    <?php echo CHtml::link('<i class="icon-lock"></i> Change Password', array('userAdmin/edit', 'id' => Yii::app()->user->id)); ?>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <?php echo CHtml::link('<i class="icon-off"></i> Logout', array('site/logout')); ?>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- /.ace-nav -->
                </div><!-- /.container-fluid -->
            </div><!-- /.navbar-inner -->
        </div>
        <div class="main-container container-fluid">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>

            <div class="sidebar" id="sidebar">
                <script type="text/javascript">
                    try {
                        ace.settings.check('sidebar', 'fixed')
                    } catch (e) {
                    }
                </script>
                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-small btn-success">
                            <i class="icon-signal"></i>
                        </button>

                        <button class="btn btn-small btn-info">
                            <i class="icon-pencil"></i>
                        </button>

                        <button class="btn btn-small btn-warning">
                            <i class="icon-group"></i>
                        </button>

                        <button class="btn btn-small btn-danger">
                            <i class="icon-cogs"></i>
                        </button>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- #sidebar-shortcuts -->
                <?php Menu::get_menu(); ?><!-- /.nav-list -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
                </div>
                <script type="text/javascript">
                    try {
                        ace.settings.check('sidebar', 'collapsed')
                    } catch (e) {
                    }
                </script>
            </div>
            <div class="main-content">
                <div class="breadcrumbs" id="breadcrumbs">
                    <script type="text/javascript">
                        try {
                            ace.settings.check('breadcrumbs', 'fixed')
                        } catch (e) {
                        }
                    </script>
                    <?php
                    $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->
                </div>
                <div class="page-content">
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- PAGE CONTENT BEGINS -->
                            <?php echo $content; ?>
                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.span -->
                    </div><!-- /.row-fluid -->
                </div><!-- /.page-content -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
            <i class="icon-double-angle-up icon-only bigger-110"></i>
        </a>
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
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/chosen.jquery.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/fuelux/fuelux.spinner.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/date-time/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/date-time/bootstrap-timepicker.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/date-time/moment.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/date-time/daterangepicker.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.knob.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.autosize-min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.maskedinput.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootstrap-tag.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/select2.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/fuelux/fuelux.wizard.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.validate.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/additional-methods.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootbox.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery-ui-1.10.3.full.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.gritter.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.slimscroll.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.hotkeys.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootstrap-wysiwyg.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/x-editable/bootstrap-editable.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/x-editable/ace-editable.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.colorbox-min.js"></script>
        <!-- ace scripts -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/ace-elements.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/ace.min.js"></script>
        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function($) {
                $('[data-rel=tooltip]').tooltip();
            });
        </script>
    </body>
</html>