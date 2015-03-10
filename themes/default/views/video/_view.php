<?php
/* @var $this VideoController */
/* @var $data Video */
?>
<div class="view">
    <div class="col-sm-3" style="margin: 0px 10px;">
        <iframe class="span11" src="//www.youtube.com/embed/<?php echo $data->youtube_id; ?>" frameborder="0" allowfullscreen></iframe>
    </div>    
</div>