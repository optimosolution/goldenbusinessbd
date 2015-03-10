<?php
/* @var $this WeblinkController */
/* @var $data Weblink */
?>
<article class="post">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3 class="post-title"><?php echo CHtml::link(CHtml::encode($data->title), $data->click_url, array('target' => '_blank')); ?></h3>
            <div class="row">
                <div class="col-lg-12">
                    <p><?php echo CHtml::decode($data->description); ?></p>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-lg-10 col-md-9 col-sm-8">
                    <i class="fa fa-clock-o"></i> <?php echo UserAdmin::get_date($data->created_on); ?>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">                    
                </div>
            </div>
        </div>
    </div>
</article> <!-- post -->