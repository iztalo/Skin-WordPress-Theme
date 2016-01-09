<?php
/*
 * Footer layouts have been added from hooks.php
 * 
 * @since Skin 1.0
*/
?>


<?php wp_footer(); ?>

<?php echo get_theme_mod('google_analytics');?>
<style>
    <?php echo stripslashes( get_theme_mod( 'custom_css' ) ); ?>  
</style>

</body>
</html>