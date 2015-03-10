<?php
/* @var $this DocumentController */
/* @var $data Document */
?>
<article class="post">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3 class="post-title"><?php echo CHtml::decode($data->title); ?></h3>
            <div class="row">
                <div class="col-lg-12">
                    <p><?php echo CHtml::decode($data->summary); ?></p>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-lg-10 col-md-9 col-sm-8">
                    <i class="fa fa-clock-o"></i> <?php echo UserAdmin::get_date($data->created_on); ?>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">   
                    <?php echo CHtml::link('<i class="fa fa-download"></i> Download', array('/document/download', 'id' => $data->id), array('class' => 'pull-right')); ?>
                </div>
            </div>
        </div>
    </div>
</article> <!-- post -->