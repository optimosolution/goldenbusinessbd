<?php $this->beginContent('//layouts/main'); ?>
<?php

$this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;',
));
?>
<?php

$this->widget('bootstrap.widgets.TbNav', array(
    'type' => TbHtml::NAV_TYPE_PILLS, // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => $this->menu,
));
?>
<?php echo $content; ?>
<?php $this->endContent(); ?>