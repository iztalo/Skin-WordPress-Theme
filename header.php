<?php
/*
 * @package WordPress
 * @subpackage Skin
 * @since Skin 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>

    </head> 

<body <?php body_class(); ?>>

  
<?php 
    if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_1') {  
    get_template_part( 'elements/header/header', '1' ); 
 }
    if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_2') {  
    get_template_part( 'elements/header/header', '2' ); 
 }
    if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_3') {  
    get_template_part( 'elements/header/header', '3' ); 
 }
    if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_4') {  
    get_template_part( 'elements/header/header', '4' ); 
 }
?>