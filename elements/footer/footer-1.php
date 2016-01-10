<footer>
    <?php if ( is_active_sidebar( 'footer-1' )  ) : ?>
    <div class="main-footer">
        <div class="container">
            <div class="row">
            
            <div class="col-md-4 col-sm-4">
                <?php if ( is_active_sidebar( 'footer-1' )  ) : ?>
                    <aside id="secondary" class="sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    </aside><!-- .sidebar .widget-area -->
                <?php endif; ?>
            </div><!-- .sidebar-wrapper -->
            
            
            <div class="col-md-4 col-sm-4">
                <?php if ( is_active_sidebar( 'footer-2' )  ) : ?>
                    <aside id="secondary" class="sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    </aside><!-- .sidebar .widget-area -->
                <?php endif; ?>
            </div><!-- .sidebar-wrapper -->
            
            
            <div class="col-md-4 col-sm-4">
                <?php if ( is_active_sidebar( 'footer-3' )  ) : ?>
                    <aside id="secondary" class="sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    </aside><!-- .sidebar .widget-area -->
                <?php endif; ?>
            </div><!-- .sidebar-wrapper -->
            
           </div>    
       </div>     
    </div>
    <?php endif; ?>

    <div class="sub-footer">
        <div class="container">
            <div class="row">
            <div class="col-md-8 col-xs-8">
                <p><?php echo get_theme_mod( 'footer_copyright','Copyright &copy; - Your Website Name' ) ; ?> </p>
            </div>
            <div class="col-md-4 col-xs-4 footer-credit">
                <p>Powered by <a href="//skin.io/" target="_blank"> Skin </a></p>
            </div>
           </div>    
       </div>   
 
    </div>
    
</footer>