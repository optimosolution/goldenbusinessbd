<section class="animated fadeIn" style="margin-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">   
                <?php $this->get_content_subcategory_list_it(194); ?>
            </div>
            <div class="col-md-4">                 
                <?php $this->get_content_subcategory_list_vat(192); ?>
            </div>            
            <div class="col-md-4">       
                <?php //$this->get_weblink__list(185); ?>
                <?php //$this->get_content_subcategory_list(207); ?>
                <?php $this->get_content_list(250); ?>
            </div>
        </div>
    </div> <!-- container -->
</section>
<section class="animated fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <?php echo Edirectory::get_letter_list(); ?>
                </div>              
            </div>
        </div>
    </div> <!-- container -->
</section>
<section class="animated fadeIn">
    <div class="container">
        <div class="row">            
            <div class="col-md-8">
                <h2 class="section-title">Profile</h2>
                <?php $this->get_latest_profile(186); ?>
                <div class="row">            
                    <div class="col-md-4"> 
                        <?php $this->get_advertisement(4); ?>
                    </div>
                    <div class="col-md-4"> 
                        <?php $this->get_advertisement(5); ?>
                    </div>
                    <div class="col-md-4"> 
                        <?php $this->get_advertisement(6); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"> 
                <?php $this->get_advertisement(3); ?>
                <?php $this->get_directory_category(); ?>
            </div>
        </div>
    </div> <!-- container -->
</section>
<section class="animated fadeIn">
    <div class="container">
        <div class="row">            
            <div class="col-md-4">
                <h2 class="section-title"><?php echo ContentCategory::getCategoryName(202); ?></h2>
                <?php $this->get_latest_business_blog(202); ?>
            </div>
            <div class="col-md-4">
                <h2 class="section-title"><?php echo ContentCategory::getCategoryName(205); ?></h2>
                <?php $this->get_latest_business_blog(205); ?>
            </div>
            <div class="col-md-4">
                <?php $this->get_weblink__list(186); ?>
                <?php $this->get_advertisement(7); ?>
            </div>
        </div>
    </div> <!-- container -->
</section>
<section class="animated fadeIn">
    <div class="container">
        <div class="row">            
            <div class="col-md-4">
                <h2 class="section-title"><?php echo ContentCategory::getCategoryName(87); ?></h2>
                <?php $this->get_latest_business_blog(87); ?>
            </div>
            <div class="col-md-4">
                <?php $this->get_weblink_list_more(187); ?>                
            </div>
            <div class="col-md-4">
                <h2 class="section-title">FACEBOOK LIKE BOX</h2>
                <?php
                $this->widget('application.extensions.fbLikeBox.fbLikeBox', array(
                    'likebox' => array(
                        'url' => 'https://www.facebook.com/GoldenBangladesh',
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
        </div>
    </div> <!-- container -->
</section>
<section class="animated fadeIn">
    <div class="container">
        <div class="row">            
            <div class="col-md-4">
                <?php $this->get_advertisement(8); ?>
            </div>
            <div class="col-md-4">
                <?php $this->get_advertisement(9); ?>
            </div>
            <div class="col-md-4">
                <?php $this->get_advertisement(10); ?>
            </div>
        </div>
    </div> <!-- container -->
</section>
<section class="animated fadeIn">
    <div class="container">
        <div class="row">            
            <div class="col-md-4">
                <h2 class="section-title"><?php echo ContentCategory::getCategoryName(31); ?></h2>
                <?php $this->get_latest_business_blog(31); ?>
            </div>
            <div class="col-md-4">
                <?php $this->get_weblink_list_more(188); ?>
            </div>
            <div class="col-md-4">
                <h2 class="section-title">BUSINESS VIDEO</h2>
                <iframe width="360" height="250" src="//www.youtube.com/embed/<?php echo $this->get_youtube_video(); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div> <!-- container -->
</section>
<section class="animated fadeIn">
    <div class="container">
        <div class="row">            
            <div class="col-md-8">
                <?php $this->get_advertisement(11); ?>
            </div>
            <div class="col-md-4">
                <?php $this->get_advertisement(12); ?>
            </div>
        </div>
    </div> <!-- container -->
</section>
<section class="animated fadeIn">
    <div class="container">
        <div class="row">            
            <div class="col-md-8">
                <h2 class="section-title">Message</h2>
                <?php $this->get_latest_profile(185); ?>
            </div>
            <div class="col-md-4">
                <?php $this->get_weblink_list_more(184); ?>
            </div>
        </div>
    </div> <!-- container -->
</section>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h4 class="section-title">Supported By</h4>
        </div>
        <?php $this->get_supported_by(1); ?>
    </div>
</div>
