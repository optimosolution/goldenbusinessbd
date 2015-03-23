<?php $this->beginContent('//layouts/main'); ?>
<header class="wrap-title">
    <div class="container">
        <h1 class="page-title">&nbsp;</h1>
        <?php if (isset($this->breadcrumbs)): ?>
            <?php
            $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                'links' => $this->breadcrumbs,
            ));
            ?><!-- breadcrumbs -->
        <?php endif ?>
    </div>
</header>
<div class="container">
    <?php
    $this->widget('bootstrap.widgets.TbAlert', array(
        'block' => true,
        'fade' => true,
        'closeText' => '&times;',
    ));
    ?>
    <?php echo $content; ?>
</div> <!-- container  -->
<?php $this->endContent(); ?>
