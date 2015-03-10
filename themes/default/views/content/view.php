<?php
$this->pageTitle = $model->title . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    $model->title,
);
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=409526085754514";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="row">
    <div class="col-md-8">
        <section>
            <h2 class="post-title"><?php echo $model->title; ?></h2>
            <p>
                <?php
                $this->widget('application.extensions.SocialShareButton.SocialShareButton', array(
                    'style' => 'horizontal',
                    'networks' => array('facebook', 'googleplus', 'linkedin', 'twitter'),
                    'data_via' => '', //twitter username (for twitter only, if exists else leave empty)
                ));
                ?>
            </p>
            <?php echo Content::get_picture($model->id); ?>
            <?php echo $model->introtext; ?>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="section-title">About Author</h4>
                    <?php echo User::get_picture_about_me($model->created_by); ?>
                    <?php
                    if ($model->created_by <= 1000) {
                        echo '<h4>' . UserAdmin::get_user_name($model->created_by) . '</h4>';
                        echo '<p class="p-lg">' . UserAdmin::get_about_us($model->created_by) . '<p>';
                    } else {
                        echo '<h4>' . User::get_user_name($model->created_by) . '</h4>';
                        echo '<p class="p-lg">' . User::get_about_us($model->created_by) . '<p>';
                    }
                    ?>                    
                </div>
            </div>
        </section>
        <section class="comment-form">
            <h2  class="post-title">Leave a Comment</h2>
            <div class="fb-comments" data-href="<?php echo 'http://www.goldenbusinessbd.com/' . Yii::app()->request->url; ?>" data-width="760" data-num-posts="10"></div>
        </section> <!-- comment-form -->
    </div>
    <div class="col-md-4">
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
            <div class="block">
                <ul class="nav nav-tabs" id="myTab2">
                    <li class="active"><a href="#fav" data-toggle="tab"><i class="fa fa-star"></i></a></li>
                    <li><a href="#categories" data-toggle="tab"><i class="fa fa-folder-open"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="fav">
                        <h3 class="post-title">Related Post</h3>
                        <?php $this->get_latest_updates($model->catid); ?>
                    </div>
                    <div class="tab-pane" id="categories">
                        <h3 class="post-title">Related Category</h3>
                        <?php $this->get_content_subcategory_list($model->catid); ?>
                    </div>
                </div> <!-- tab-content -->				
            </div>
        </aside> <!-- Sidebar -->
    </div>
</div>