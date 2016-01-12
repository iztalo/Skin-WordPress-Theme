<?php 

function responsive_style() {
    
	// Add Responsive Style 
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/responsive.css', array() );   
}

add_action('wp_footer','responsive_style');

// WooCommerce Support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
} 

/*
 *  
 * @since Skin 1.0
 */
if ( ! function_exists( 'skin_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own skin_theme_setup() function to override in a child theme.
 *
 * @since Skin 1.0
 */
function skin_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory. 
	 */
	load_theme_textdomain( 'skin', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

    // Add support for Custom background
    add_theme_support( 'custom-background' ); 

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 0, true );
    // Image Sizes
    add_image_size( 'featured_one_thumb', 733, 390, true );
    add_image_size( 'content_one_thumb', 354, 200 , true );
    add_image_size( 'related_thumb', 177, 130 , true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'skin_primary' => __( 'Primary Menu', 'skin' ), 
		'skin_mobile' => __( 'Mobile Menu', 'skin' ), 
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
endif; // skin_theme_setup
add_action( 'after_setup_theme', 'skin_theme_setup' );


/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Skin 1.0
 */
function skin_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'skin_content_width', 733 );
}
add_action( 'after_setup_theme', 'skin_content_width', 0 );



/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Skin 1.0
 */
function skin_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'skin' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'skin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'skin' ),
		'id'            => 'footer-1',
		'description'   => __( 'Appears in the Footer.', 'skin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'skin' ),
		'id'            => 'footer-2',
		'description'   => __( 'Appears in the Footer.', 'skin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'skin' ),
		'id'            => 'footer-3',
		'description'   => __( 'Appears in the Footer.', 'skin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'skin_theme_widgets_init' );


/*
 * Adding custom class in the body tag to control and style elements according to the layout.
 * 
 * @since Skin 1.0
*/
function add_layout_class( $classes ) {

if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_1') {
	array_push( $classes, 'header-style-1' );
 }
if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_2') {  
	array_push( $classes, 'header-style-2' );
}
if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_3') {  
	array_push( $classes, 'header-style-3' );
}
if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_4') {  
	array_push( $classes, 'header-style-4' ); 
}
    return $classes;
}
add_filter('body_class', 'add_layout_class');


/*
 * Silk Custom BreadCrumb.
 * 
 * This theme also supports Yoast BreadCrumb. Once you activate Yoast BreadCrumb this breadcrumb will be deactivated automatically.
 * 
 * @since Skin 1.0
*/
if ( ! function_exists( 'skin_breadcrumb' ) ) {
	function skin_breadcrumb( $args = array() ) {
		if ( is_front_page() ) {
			return;
		} 
		global $post; 
		$defaults  = array(
			'separator_icon'      => '&gt;',
			'breadcrumbs_id'      => 'breadcrumbs',
			'breadcrumbs_classes' => 'breadcrumb-trail breadcrumbs',
			'home_title'          => __('Home','skin'),
		);
		$args      = apply_filters( 'skin_breadcrumbs_args', wp_parse_args( $args, $defaults ) );
		$separator = '<span class="separator"> ' . esc_attr( $args['separator_icon'] ) . ' </span>';
		/***** Begin Markup *****/
		// Open the breadcrumbs
		$html = '<div id="' . esc_attr( $args['breadcrumbs_id'] ) . '" class="' . esc_attr( $args['breadcrumbs_classes'] ) . '">';
		// Add Homepage link & separator (always present)
		$html .= '<span class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . esc_attr( $args['home_title'] ) . '">' . esc_attr( $args['home_title'] ) . '</a></span>';
		$html .= $separator;
		// Post
		if ( is_singular( 'post' ) ) {
			$category = get_the_category();
			$category_values = array_values( $category );
			$last_category = end( $category_values );
			$cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
			$cat_parents = explode( ',', $cat_parents );
			foreach ( $cat_parents as $parent ) {
				$html .= '<span class="item-cat">' . wp_kses( $parent, wp_kses_allowed_html( 'a' ) ) . '</span>';
				$html .= $separator;
			}
			$html .= '<span class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></span>';
		} elseif ( is_singular( 'page' ) ) {
			if ( $post->post_parent ) {
				$parents = get_post_ancestors( $post->ID );
				$parents = array_reverse( $parents );
				foreach ( $parents as $parent ) {
					$html .= '<span class="item-parent item-parent-' . esc_attr( $parent ) . '"><a class="bread-parent bread-parent-' . esc_attr( $parent ) . '" href="' . esc_url( get_permalink( $parent ) ) . '" title="' . get_the_title( $parent ) . '">' . get_the_title( $parent ) . '</a></span>';
					$html .= $separator;
				}
			}
			$html .= '<span class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></span>';
		} elseif ( is_singular( 'attachment' ) ) {
			$parent_id        = $post->post_parent;
			$parent_title     = get_the_title( $parent_id );
			$parent_permalink = esc_url( get_permalink( $parent_id ) );
			$html .= '<span class="item-parent"><a class="bread-parent" href="' . esc_url( $parent_permalink ) . '" title="' . esc_attr( $parent_title ) . '">' . esc_attr( $parent_title ) . '</a></span>';
			$html .= $separator;
			$html .= '<span class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></span>';
		} elseif ( is_singular() ) {
			$post_type         = get_post_type();
			$post_type_object  = get_post_type_object( $post_type );
			$post_type_archive = get_post_type_archive_link( $post_type );
			$html .= '<span class="item-cat item-custom-post-type-' . esc_attr( $post_type ) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr( $post_type ) . '" href="' . esc_url( $post_type_archive ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . esc_attr( $post_type_object->labels->name ) . '</a></span>';
			$html .= $separator;
			$html .= '<span class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . $post->post_title . '">' . $post->post_title . '</span></span>';
		} elseif ( is_category() ) {
			$parent = get_queried_object()->category_parent;
			if ( $parent !== 0 ) {
				$parent_category = get_category( $parent );
				$category_link   = get_category_link( $parent );
				$html .= '<span class="item-parent item-parent-' . esc_attr( $parent_category->slug ) . '"><a class="bread-parent bread-parent-' . esc_attr( $parent_category->slug ) . '" href="' . esc_url( $category_link ) . '" title="' . esc_attr( $parent_category->name ) . '">' . esc_attr( $parent_category->name ) . '</a></span>';
				$html .= $separator;
			}
			$html .= '<span class="item-current item-cat"><span class="bread-current bread-cat" title="' . $post->ID . '">' . single_cat_title( '', false ) . '</span></span>';
		} elseif ( is_tag() ) {
			$html .= '<span class="item-current item-tag"><span class="bread-current bread-tag">' . single_tag_title( '', false ) . '</span></span>';
		} elseif ( is_author() ) {
			$html .= '<span class="item-current item-author"><span class="bread-current bread-author">' . get_queried_object()->display_name . '</span></span>';
		} elseif ( is_day() ) {
			$html .= '<span class="item-current item-day"><span class="bread-current bread-day">' . get_the_date() . '</span></span>';
		} elseif ( is_month() ) {
			$html .= '<span class="item-current item-month"><span class="bread-current bread-month">' . get_the_date( 'F Y' ) . '</span></span>';
		} elseif ( is_year() ) {
			$html .= '<span class="item-current item-year"><span class="bread-current bread-year">' . get_the_date( 'Y' ) . '</span></span>';
		} elseif ( is_archive() ) {
			$custom_tax_name = get_queried_object()->name;
			$html .= '<span class="item-current item-archive"><span class="bread-current bread-archive">' . esc_attr( $custom_tax_name ) . '</span></span>';
		} elseif ( is_search() ) {
			$html .= '<span class="item-current item-search"><span class="bread-current bread-search">Search results for: ' . get_search_query() . '</span></span>';
		} elseif ( is_404() ) {
			$html .= '<span>' . __( 'Error 404', 'skin' ) . '</span>';
		} elseif ( is_home() ) {
			$html .= '<span>' . get_the_title( get_option( 'page_for_posts' ) ) . '</span>';
		}
		$html .= '</div>';
		$html = apply_filters( 'skin_breadcrumbs_filter', $html );
		echo wp_kses_post( $html );
	}
}


/*
 * Silk Post Meta.
 * 
 * silk_post_meta() function was created to add meta information at the end of single posts. You can edit the function using silk_post_meta() in Child theme.
 * 
 * @since Skin 1.0
*/

if (! function_exists('silk_post_meta') ) {
    function silk_post_meta(){
        if(is_single() || is_page()) { ?>
            <div class="post-meta">
                <?php _e('published on ','skin'); the_date();

             printf( '<span class="byline">'. _x('by',' ','skin') .'<span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>', get_the_author_meta(), _x( 'Author', 'Used before post author name.', 'skin' ), esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author() );

edit_post_link( sprintf( __( 'Edit', 'skin' )), '<span class="edit-link">', '</span>' ); ?>                

                <span class="comments-holder"><?php comments_popup_link( __('0 Comments','skin'), __('1 Comment','skin'), __('% Comment','skin')); ?> <i class="fa fa-comment"></i> </span>
                <div class="cb"></div>

            </div>
        <?php }   
    }
}


/*
 * Add Back to top feature in footer, to move smoothly to top.
 *
 * @since Skin 1.0
 */
add_action('wp_footer','wpskin_backtotop');
function wpskin_backtotop(){
    echo '<a href="#" class="back-to-top"> '. __('top','skin') . ' </a>';
}


/*
 * Adding Meta name="generator" in header through wp_head()
 *
 * @since Skin 1.0
 */

add_action( 'wp_head', 'skin_generator' );
function skin_generator() { 
	echo '<meta name="generator" content="Skin WP Theme" />';
}

/*
 * Including required files thought require_once() function.
 * 
 * Theme Customizer and Hooks.php files are added into the theme.
 * @since Skin 1.0
*/ 
require_once('inc/customizer.php');
require_once('hooks.php');



/*
 * Category selector for Theme customizer. 
 * 
 * It fetches all the category names throught get_categories() and displays in select in Theme Customizer.
 * 
 * @since Skin 1.0
*/
function get_all_categories_list() {
  $all_cats = get_categories();
  $results;

  $count = count($all_cats);
  for ($i=0; $i < $count; $i++) {
    if (isset($all_cats[$i]))
      $results[$all_cats[$i]->slug] = $all_cats[$i]->name;
    else
      $count++;
  }
  return $results;
}

/*
 * Enqueueing Styles and Scripts. 
 *
 * @since Skin 1.0
*/

function skin_scripts() { 
    
// Loading Styles for the theme

	// Add FontAwesome, used in the main stylesheet.
    
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array() );

	// Add BootStrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array() );
    
	// Add Swiper Slider Style
	wp_enqueue_style( 'swiper-slider', get_template_directory_uri() . '/assets/css/swiper.min.css', array() );
    
    // Theme stylesheet.
	wp_enqueue_style( 'skin-style', get_stylesheet_uri() );
    
    // Header style
    if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_1') {  
	wp_enqueue_style( 'header_style_1', get_template_directory_uri() . '/elements/header/header-1.css', array() );
 }
    if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_2') {  
	wp_enqueue_style( 'header_style_2', get_template_directory_uri() . '/elements/header/header-2.css', array() );
 }
    if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_3') {  
	wp_enqueue_style( 'header_style_3', get_template_directory_uri() . '/elements/header/header-3.css', array() );
}
    if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_4') {  
	wp_enqueue_style( 'header_style_4', get_template_directory_uri() . '/elements/header/header-4.css', array() );
}
    
    // Featured style

    if (get_theme_mod('featured_style_selector', 'skin_1') === 'skin_1') {  
	wp_enqueue_style( 'featured_style_1', get_template_directory_uri() . '/elements/featured/featured-1.css', array() );
 }
    if (get_theme_mod('featured_style_selector', 'skin_1') === 'skin_2') {  
	wp_enqueue_style( 'featured_style_2', get_template_directory_uri() . '/elements/featured/featured-2.css', array() );
 }    
    
    
    
    // Post style
if (get_theme_mod('post_area_style_selector', 'skin_1') === 'skin_1') {  
	wp_enqueue_style( 'home_layout_style_1', get_template_directory_uri() . '/elements/home-layout/layout-1.css', array() );
      }
if (get_theme_mod('post_area_style_selector', 'skin_1') === 'skin_2') {  
	wp_enqueue_style( 'home_layout_style_2', get_template_directory_uri() . '/elements/home-layout/layout-2.css', array() );
      }
if (get_theme_mod('post_area_style_selector', 'skin_1') === 'skin_3') { 
	wp_enqueue_style( 'home_layout_style_3', get_template_directory_uri() . '/elements/home-layout/layout-3.css', array() );
      }
    
    // Adding google fonts. Added at in end for performance in mind. Site should not wait for Google fonts to load.
    wp_enqueue_style( 'skin-google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,300,500,700', false ); 

     
// Loading Scripts for the theme 
    
    // Loading BootStarp.min.js 
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() .'/assets/js/bootstrap.min.js', array('jquery'), 1.0, true);
    
    // Load Script for Swiper Slider
    wp_enqueue_script( 'swiperslider', get_template_directory_uri() .'/assets/js/swiper.min.js', array('jquery'), 1.0, true);

    // Load scripts.js to run custom functions
    wp_enqueue_script( 'custom-js', get_template_directory_uri() .'/assets/js/custom.js', array('jquery'), 1.0, true);
    
     // Load Script only on Singular Pages where Comment Form is loaded.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skin_scripts' );


/*
 * Adding Menu in the Header 
 *
 * @since Skin 1.0
*/

if ( ! function_exists('skin_header_menu')) {
	function skin_header_menu() {
        wp_nav_menu(array(
            'theme_location'    => 'skin_primary',
            'menu_class'        => 'primary-menu',
	        ));
	} 
}

/*
 * Social Media Icons for Headers
 *
 * @since Skin 1.0
*/

if( ! function_exists( 'skin_social_icons' ) ){
    function skin_social_icons() { 
        $icon_style = get_theme_mod('skin_icon_style','icon_type_round'); ?>
	<div class="social-icons <?php echo $icon_style; ?>">
		<ul>
			<?php if ( get_theme_mod( 'skin_twitter_on_off','1' ) == '1' ) { ?>
			    <li><a href="<?php echo get_theme_mod( 'skin_twitter_link','#' )?>"><i class="fa fa-twitter fa-2x"></i></a></li>
			<?php } ?>

			<?php if ( get_theme_mod( 'skin_facebook_on_off','1' ) == '1' ) { ?>
			    <li><a href="<?php echo get_theme_mod( 'skin_facebook_link','#' )?>"><i class="fa fa-facebook fa-2x"></i></a></li> 
			<?php } ?>  
			   
			<?php if ( get_theme_mod( 'skin_instagram_on_off','1' ) == '1' ) { ?>  
			    <li><a href="<?php echo get_theme_mod( 'skin_instagram_link','#' )?>"><i class="fa fa-instagram fa-2x"></i></a></li>
			<?php } ?> 

			<?php if ( get_theme_mod( 'skin_youtube_on_off','1' ) == '1' ) { ?>
			    <li><a href="<?php echo get_theme_mod( 'skin_youtube_link','#' )?>"><i class="fa fa-youtube-play fa-2x"></i></a></li>
			<?php } ?> 
			   
			<?php if ( get_theme_mod( 'skin_linkedin_on_off','0' ) == '1' ) { ?>
			    <li><a href="<?php echo get_theme_mod( 'skin_linkedin_link','#' )?>"><i class="fa fa-linkedin fa-2x"></i></a></li>
			<?php } ?> 

			<?php if ( get_theme_mod( 'skin_pinterest_on_off','0' ) == '1' ) { ?>
			    <li><a href="<?php echo get_theme_mod( 'skin_pinterest_link','#' )?>"><i class="fa fa-pinterest fa-2x"></i></a></li>
			<?php } ?> 

			<?php if ( get_theme_mod( 'skin_google_plus_on_off','0' ) == '1' ) { ?>  
			    <li><a href="<?php echo get_theme_mod( 'skin_google_plus_link','#' )?>"><i class="fa fa-google-plus fa-2x"></i></a></li>
			<?php } ?> 

			<?php if ( get_theme_mod( 'skin_tumblr_on_off','0' ) == '1' ) { ?>      
			    <li><a href="<?php echo get_theme_mod( 'skin_tumblr_link','#' )?>"><i class="fa fa-tumblr fa-2x"></i></a></li> 
			<?php } ?> 

			<?php if ( get_theme_mod( 'skin_reddit_on_off','0' ) == '1' ) { ?>    
			    <li><a href="<?php echo get_theme_mod( 'skin_reddit_link','#' )?>"><i class="fa fa-reddit fa-2x"></i></a></li>  

			<?php } ?>     
		</ul>
	</div>        
    <?php }
}