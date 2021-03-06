<?php
/*
 * @package WordPress
 * @subpackage Skin
 * @since Skin 1.0
 */
?>
<div class="content_loop blog-layout-3">
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post();  ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="blog_post">
                <?php if ( has_post_thumbnail() ) { ?>
                <div class="blog_post_img col-md-4 col-xs-4">
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail('content_one_thumb' ); ?>
                    </a>
                </div> 
                <?php } else { } ?> 
                <div class="blog_post_content <?php if ( has_post_thumbnail() ) { ?> col-md-8 col-xs-8 <?php } else { ?> col-md-12 col-xs-12 <?php } ?>">
                    <div class="blog_post_cat"><?php the_category(', ') ?></div>
                    <h2>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"> <?php the_title(); ?></a>
                    </h2>
 


                    <div class="entry">

                    <?php if ( has_post_thumbnail()){ echo substr(strip_tags($post->post_content), 0, 150); } else { echo substr(strip_tags($post->post_content), 0, 350); } ?>
                    </div>
                </div><!-- .blog_post_content -->

            </div><!-- .blog_post -->
    </article><!-- #post-## -->
    <?php endwhile; ?>
    
    <?php
        // Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'skin' ),
				'next_text'          => __( 'Next page', 'skin' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'skin' ) . ' </span>',
			) ); ?>    
    
    <?php else : ?>
        <h2 class="center"> <?php _e('Not Found','skin') ?></h2>
        <p class="center">
        <?php _e('Sorry, but you are looking for something that isn\'t here.','skin'); ?></p>
    <?php endif; ?>
            
</div><!-- .content_loop -->
