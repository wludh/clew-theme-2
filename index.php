<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'one-col')); ?> 


            
<div id="primary">
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    	<p><?php echo $homepageText; ?></p>
    <?php endif; ?>


</div><!-- end primary -->


    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

</div><!-- end secondary -->
<?php echo foot(); ?>
