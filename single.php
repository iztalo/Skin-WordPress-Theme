<?php
/* 
 *
 * @package WordPress
 * @subpackage Skin
 * @since Skin 1.0
 */
get_header(); ?>
<main>

<div class="main-wrapper">
    <div class="container content-holder">
        <div class="row">
            <!-- BrearCrumbs-->
            <div class="col-md-12 breadcrumb">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    $yoast_links_options = get_option( 'wpseo_internallinks' );
                    $yoast_bc_enabled=$yoast_links_options['breadcrumbs-enable'];
                        if ($yoast_bc_enabled) { ?>
                            <span class="breadcrumb_heading"> <?php _e('you are here','skin'); ?></span>
                            <?php yoast_breadcrumb('<p id="breadcrumbs"> <i class="fa fa-home fa-2x"></i>','</p>');
                        } else { ?>
                           <span class="skin_breadcrumb breadcrumb_heading"> <?php _e('you are here','skin'); ?> <i class="fa fa-home fa-2x"></i></span> 
                            <?php skin_breadcrumb();  
                        }
                    } ?>  
               
           </div>
           <!-- BrearCrumbs-->
            
            <div class="content-wrapper col-md-8">
                
                <?php
                /*
                 * This action hook will get the layout file selected from the theme customizer.
                */
                
                do_action('single_content_area_hook'); ?>
                
            </div><!-- .content-wrapper -->
    
            <?php get_sidebar(); ?>
            
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .main-wrapper -->
    
</main>
<?php get_footer(); ?>