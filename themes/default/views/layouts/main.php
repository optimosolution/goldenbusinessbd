<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="S.M. Saidur Rahman">
        <meta name="generator" content="Optimo Solution" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <!-- CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/animate.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/lightbox.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/syntax/shCore.css" rel="stylesheet"  media="screen">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/syntax/shThemeDefault.css" rel="stylesheet"  media="screen">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" media="screen" title="default">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/color-default.css" rel="stylesheet" media="screen" title="default">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/width-full.css" rel="stylesheet" media="screen" title="default">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/html5shiv.js"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/respond.min.js"></script>
        <![endif]-->        
    </head>
    <body>
        <div class="boxed animated fadeIn animation-delay-5">
            <header id="header" class="hidden-xs">
                <div class="container">
                    <div id="header-title">
                        <h1 class="animated fadeInDown"><?php echo CHtml::link('Golden<span>Business</span>', array('site/index'), array('class' => '')); ?></h1>
                        <p class="animated fadeInLeft">Largest and fastest growing business Portals</p>
                    </div>
                    <div id="social-header" class="hidden-xs">
                        <a href="#" class="social-icon soc-twitter animated fadeInDown animation-delay-1"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="social-icon soc-google-plus animated fadeInDown animation-delay-2"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="social-icon soc-facebook animated fadeInDown animation-delay-3"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="social-icon soc-instagram animated fadeInDown animation-delay-4"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="social-icon soc-pinterest animated fadeInDown animation-delay-5"><i class="fa fa-pinterest"></i></a>
                        <a href="#" class="social-icon soc-linkedin animated fadeInDown animation-delay-6"><i class="fa fa-linkedin"></i></a>
                        <a href="#" class="social-icon soc-github animated fadeInDown animation-delay-7"><i class="fa fa-github"></i></a>
                    </div>
                    <div id="search-header" class="hidden-xs animated bounceInRight">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                </div> <!-- container -->
            </header> <!-- header -->
            <nav class="navbar navbar-static-top navbar-mind" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <?php echo CHtml::link('Golden<span>Business</span>', array('site/index'), array('class' => 'navbar-brand visible-xs')); ?>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-mind-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-bars fa-inverse"></i>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-mind-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <?php echo CHtml::link('Home', array('site/index'), array('class' => '')); ?>
                            </li>
                            <li class="">
                                <?php echo CHtml::link('About Us', array('content/view', 'id' => 75), array('class' => '')); ?>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Income Tax <b class="caret"></b></a>
                                <ul class="dropdown-menu">                                    
                                    <li><?php echo CHtml::link('Ordinance', array('content/ordinance'), array('class' => '')); ?></li>
                                    <li><?php echo CHtml::link('Rules', array('content/rules', 'id' => 75), array('class' => '')); ?></li>
                                    <li><?php echo CHtml::link('Finance Act', array('document/index', 'id' => 209), array('class' => '')); ?></li>
                                    <li><?php echo CHtml::link('Paripatra', array('content/index', 'id' => 214), array('class' => '')); ?></li>        
                                    <li><?php echo CHtml::link('SRO', array('sro/index', 'id' => 1), array('class' => '')); ?></li>
                                    <li><?php echo CHtml::link('Income Tax Accounts Code', array('content/index', 'id' => 164), array('class' => '')); ?></li>
                                    <li><?php echo CHtml::link('Pevailing Rates of Gross Profit', array('content/index', 'id' => 165), array('class' => '')); ?></li>
                                    <li><?php echo CHtml::link('FAQs', array('content/index', 'id' => 76), array('class' => '')); ?></li>
                                    <li><?php echo CHtml::link('Forms', array('document/index', 'id' => 73), array('class' => '')); ?></li>
                                </ul>
                            </li> <!-- dropdown -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">VAT <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><?php echo CHtml::link('Law', array('content/index', 'id' => 34), array('class' => '')); ?></li>
<<<<<<< HEAD
                                    <li><?php echo CHtml::link('Rules', array('content/rules', 'id' => 35), array('class' => '')); ?></li>
                                    <li>
                                        <?php //echo CHtml::link('SRO', array('document/index', 'id' => 78), array('class' => '')); ?>
                                        <?php echo CHtml::link('SRO', array('sro/index', 'id' => 3), array('class' => '')); ?>
                                    </li>
=======
                                    <li><?php echo CHtml::link('Rules', array('content/index', 'id' => 35), array('class' => '')); ?></li>
                                    <li><?php echo CHtml::link('SRO', array('sro/index', 'id' => 3), array('class' => '')); ?></li>
>>>>>>> origin/master
                                    <li><?php echo CHtml::link('Forms', array('document/index', 'id' => 170), array('class' => '')); ?></li>
                                    <li><?php echo CHtml::link('Treasury Code', array('content/index', 'id' => 171), array('class' => '')); ?></li>   
                                    <li><?php echo CHtml::link('VAT at Source', array('content/index', 'id' => 172), array('class' => '')); ?></li> 
                                    <li><?php echo CHtml::link('FAQ', array('content/view', 'id' => 36), array('class' => '')); ?></li>
                                    <li><?php echo CHtml::link('Act English Version', array('content/index', 'id' => 173), array('class' => '')); ?></li>
                                </ul>
                            </li> <!-- dropdown -->
                            <li class="">
                                <?php //echo CHtml::link('Jurisdiction', array('content/view', 'id' => 1228), array('class' => '')); ?>
                                <?php echo CHtml::link('Jurisdiction', array('jurisdiction/index'), array('class' => '')); ?>
                            </li>
                            <li class="">
                                <?php echo CHtml::link('Tax Calculator', array('document/index', 'id' => 182), array('class' => '')); ?>
                            </li>
                            <li class="">
                                <?php echo CHtml::link('Directory', array('edirectory/index'), array('class' => '')); ?>
                            </li>
                            <li class="">
                                <?php echo CHtml::link('Business Blog', array('content/index', 'id' => 202), array('class' => '')); ?>
                            </li>
                            <li class="">
                                <?php echo CHtml::link('FAQs', array('content/index', 'id' => 31), array('class' => '')); ?>
                            </li>
                            <li class="">
                                <?php echo CHtml::link('Contact Us', array('site/contact'), array('class' => '')); ?>
                            </li>
                        </ul> <!-- nav nabvar-nav -->
                        <ul class="nav navbar-nav navbar-right">
                            <?php if (Yii::app()->user->isGuest) { ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>
                                    <div class="dropdown-menu dropdown-login animated fadeInUp">
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'subscribe-form',
                                            'action' => Yii::app()->createUrl('/site/login'),
                                            'enableAjaxValidation' => false,
                                            'htmlOptions' => array('role' => 'form', 'style' => ''),
                                        ));
                                        ?>
                                        <h4 class="section-title">Login Form</h4>
                                        <div class="form-group">
                                            <div class="input-group login-input">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <?php echo CHtml::textField('LoginFormUser[username]', '', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Username')); ?> 
                                            </div>
                                            <br>
                                            <div class="input-group login-input">
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <?php echo CHtml::passwordField('LoginFormUser[password]', '', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Password')); ?> 
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Remember me
                                                </label>
                                            </div>
                                            <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary pull-right')); ?>
                                            <div class="clearfix"></div>
                                        </div>
                                        <?php $this->endWidget(); ?>      
                                    </div>
                                </li> <!-- dropdown -->
                            <?php } ?>
                            <?php if (!Yii::app()->user->isGuest) { ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo User::get_user_name(Yii::app()->user->id); ?></a>                                
                                    <div class="dropdown-menu dropdown-profile animated fadeInUp">
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/profile.jpg" class="imageborder alignleft" alt="image"> 
                                        <h4><?php echo User::get_user_name(Yii::app()->user->id); ?></h4>
                                        <?php echo User::get_user_email(Yii::app()->user->id); ?><br />
                                        <?php echo CHtml::link('<i class="fa fa-plus"></i> Submit New Article', array('/content/create')); ?><br />
                                        <?php echo CHtml::link('Profile', array('/user/view', 'id' => Yii::app()->user->id)); ?> | <?php echo CHtml::link('Logout', array('/site/logout')); ?>                                        
                                    </div>                                
                                </li> <!-- dropdown -->
                            <?php } else { ?>
                                <li><?php echo CHtml::link('Register', array('/user/create')); ?></li>
                            <?php } ?>
                        </ul> <!-- nav nabvar-nav -->
                    </div><!-- navbar-collapse -->
                </div> <!-- container -->
            </nav> <!-- navbar navbar-default -->
            <?php echo $content; ?>
            <aside id="footer-widgets">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="footer-widget-title">Sitemap</h3>
                            <ul class="list-unstyled three_cols">
                                <li><?php echo CHtml::link('Home', array('/site/index'), array('class' => '')); ?></li>
                                <li><?php echo CHtml::link('Blog', array('/content/index', 'id' => 202), array('class' => '')); ?></li>
                                <li><?php echo CHtml::link('FAQs', array('/content/index', 'id' => 31), array('class' => '')); ?></li>                                
                                <li><?php echo CHtml::link('Country Profile', array('/content/index', 'id' => 85), array('class' => '')); ?></li>
                                <li><?php echo CHtml::link('Success Story', array('/content/index', 'id' => 86), array('class' => '')); ?></li>
                                <li><?php echo CHtml::link('Business Article', array('/content/index', 'id' => 87), array('class' => '')); ?></li>                               
                                <li><?php echo CHtml::link('Press And Media', array('/content/index', 'id' => 88), array('class' => '')); ?></li>
                                <li><?php echo CHtml::link('Start Ups', array('/content/index', 'id' => 183), array('class' => '')); ?></li>
                                <li><?php echo CHtml::link('CSR in BD', array('/content/view', 'id' => 539), array('class' => '')); ?></li>                                
                                <li><?php echo CHtml::link('Regulation Authorities', array('/content/index', 'id' => 196), array('class' => '')); ?></li>
                                <li><?php echo CHtml::link('Impotant Links', array('/weblink/index', 'id' => 79), array('class' => '')); ?></li>
                                <li><?php echo CHtml::link('Contact Us', array('/site/contact'), array('class' => '')); ?></li>
                                <li><?php echo CHtml::link('Videos', array('/video/index'), array('class' => '')); ?></li>
                            </ul>
                            <h3 class="footer-widget-title">Subscribe</h3>
                            <p>Enter your e-mail below to subscribe to our free newsletter. We promise not to bother you often!</p>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'subscribe-form',
                                'action' => Yii::app()->createUrl('/site/subscrib'),
                                'enableAjaxValidation' => false,
                            ));
                            ?>
                            <div class="input-group">
                                <?php echo CHtml::textField('Subscriber[email]', '', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Email Adress')); ?> 
                                <span class="input-group-btn">
                                    <?php echo CHtml::submitButton('Subscribe', array('class' => 'btn btn-success')); ?>
                                </span>
                            </div><!-- /input-group -->
                            <?php $this->endWidget(); ?>
                        </div>
                        <div class="col-md-5">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Popular Blog Post</h3>
                                <?php $this->get_popular_business_blog(202); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Recent Listing</h3>
                                <?php $this->get_latest_directory(); ?>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </aside> <!-- footer-widgets -->
            <footer id="footer">
                <p>&copy; <?php echo date('Y'); ?> <?php echo Yii::app()->name; ?>. All rights reserved. Designed and developed by <?php echo CHtml::link('Optimo Solution', 'http://www.optimosolution.com', array('target' => '_blank')); ?></p>
            </footer>
        </div> <!-- boxed -->
        <div id="back-top">
            <a href="#header"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Scripts -->
        <script>
            if (!window.jQuery) {
                document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.10.2.min.js"><\/script>');
            }
        </script>
<!--        <script src="<?php //echo Yii::app()->theme->baseUrl;   ?>/js/jquery-1.10.2.min.js"></script>-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.cookie.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mixitup.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/lightbox-2.6.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/holder.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/app.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/styleswitcher.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/syntax/shCore.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/syntax/shBrushXml.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/syntax/shBrushJScript.js"></script>
        <script type="text/javascript">
            SyntaxHighlighter.all()
        </script>
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-39621594-6', 'auto');
        ga('send', 'pageview');
      </script>
      <!-- Piwik -->
        <script type="text/javascript">
          var _paq = _paq || [];
          _paq.push(["setCookieDomain", "*.www.goldenbusinessbd.com"]);
          _paq.push(["setDomains", ["*.www.goldenbusinessbd.com"]]);
          _paq.push(['trackPageView']);
          _paq.push(['enableLinkTracking']);
          (function() {
            var u="//wa.optimosolution.com/";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', '2']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
          })();
        </script>
        <noscript><p><img src="//wa.optimosolution.com/piwik.php?idsite=2" style="border:0;" alt="" /></p></noscript>
        <!-- End Piwik Code -->
    </body>
</html> 