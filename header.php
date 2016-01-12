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




<!-- Checkbox to show/hide the navigation menu -->
<input type="checkbox" name="menu" value="toggle" id="toggle">
 
<!-- navigation menu container -->
 
<div id="off-canvas-menu">
 
   <!-- Lable for #showmenu to hide the menu/uncheck the checkbox -->
   <label class="toggle" for="toggle"><i class="fa fa-2x fa-bars"></i></label>
 
   <!-- Menu content -->
 
    <nav class="menu-content">
        <?php skin_social_icons(); 
         get_search_form();?> 
        <!-- Menu Section title -->
        <span>  Navigation Links</span>
        <!-- First Menu -->
        <ul>
            <li><a href="#"><i class="fa fa-home"></i>  Home</a></li>
            <li><a href="#"><i class="fa fa-picture-o"></i>  Portfolio</a> </li>
            <li>
                <!-- Second tier dropdown -->
                <label for="dropdown-1" class="dropdown-1" ><a  >Blog</a></label>
                <input type="checkbox" name="menu" id="dropdown-1">
                <ul id="sub-menu" class="dropdown-1">
                    <!-- Dropdown links here -->
                    <li><a href="#"><i class="fa fa-code"></i>  Tutorials</a></li>
                    <li><a href="#"><i class="fa fa-eye"></i>  Inspiration</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-user"></i>  About</a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i>  Contact</a></li>
        </ul>
    </nav> 
</div>
<!-- /#menu -->

    


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
