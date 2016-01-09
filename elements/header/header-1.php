<header class="header_1">
    <div class="top-header">
        <div class="container">
            <div class="row"> 

                <div class="col-md-4 logo">
                    <?php if ( get_theme_mod( 'header_logo' ) ) : ?>
                <a href="<?php echo  esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_theme_mod( 'header_logo' ) ; ?>" alt="<?php bloginfo('name'); ?>" /></a>
              <?php else : ?>
                 <?php if(is_home()) { ?>
                    <h1 class='site-title'>
                      <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'> <?php bloginfo( 'name' ); ?></a>
                    </h1>
                    <p><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>' rel='home'> <?php bloginfo( 'description' ); ?></a></p>
                    <?php } else {?>
                    <h2 class='site-title'>
                      <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'> <?php bloginfo( 'name' ); ?></a>
                    </h2>
                    <p><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>' rel='home'> <?php bloginfo( 'description' ); ?></a></p>
              <?php } endif; ?>
                </div>

                <div class="col-md-8 search-area">
                   <?php
                    // Social Icons
                    if( function_exists( 'skin_social_icons' ) ) {
                        skin_social_icons();
                    } ?>
                    
                    <div class="header-search"> <?php get_search_form();?> </div>
               </div> <!--  .search-area-->

            </div> 
 
        </div>
    </div>  <!--  .top-header -->
    
    <div class="menu-wrapper">
       <div class="container">
            <div class="row">
                <?php if ( has_nav_menu( 'skin_primary' )) : ?>
                    <button id="menu-toggle" class="menu-toggle">
                        <i class="fa fa-bars fa-2x"></i>
                    </button>

					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'skin_primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Primary Menu', 'skin' ); ?>">
                            <?php
                                if ( function_exists( 'skin_header_menu' ) ) : 
                                skin_header_menu();
                                endif;
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?> 
					</div><!-- .site-header-menu -->
				<?php endif; ?>         
           
            </div>
        </div>
    </div>
        
</header>