<header id="apus-header" class="apus-header header-default hidden-sm hidden-xs" role="banner">
    <div class="header-middle <?php echo (charityheart_get_config('keep_header') ? 'main-sticky-header-wrapper' : ''); ?>">
        <div class="<?php echo (charityheart_get_config('keep_header') ? 'main-sticky-header' : ''); ?>">
            <div class="header-inner">
                <div class="container">
                    <div class="pull-left">
                        <div class="logo-in-theme ">
                            <?php get_template_part( 'page-templates/parts/logo-white' ); ?>
                        </div>
                    </div>
                    <div class="p-relative pull-left">
                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <div class="main-menu pull-left">
                                <nav 
                                 data-duration="400" class="hidden-xs hidden-sm apus-megamenu slide animate navbar p-static" role="navigation">
                                <?php   $args = array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'collapse navbar-collapse no-padding',
                                        'menu_class' => 'nav navbar-nav megamenu',
                                        'fallback_cb' => '',
                                        'menu_id' => 'primary-menu',
                                        'walker' => new Charityheart_Nav_Menu()
                                    );
                                    wp_nav_menu($args);
                                ?>
                                </nav>
                            </div>
                        <?php endif; ?>
                        <div class="pull-left">
                            <?php get_template_part( 'page-templates/parts/productsearchform' ); ?>
                        </div>
                    </div>
                    <div class="pull-right header-right">
                        <?php if ( is_active_sidebar('about-us') ): ?>
                            <div class="pull-right wrapper-topmenu hidden-xs hidden-sm">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-setting btn-lg about-us-sidebar-btn">
                                        <i class="mn-icon-103"></i>
                                    </button>
                                </div>                                                                     
                            </div>
                        <?php endif; ?>
                        <?php if( defined('CHARITYHEART_GIVE_ACTIVED') && CHARITYHEART_GIVE_ACTIVED && charityheart_get_config('show_donation_button', true) ){ ?>
                            <div class="donate pull-right">
                                <a href="<?php echo esc_url(get_post_type_archive_link( 'give_forms' )); ?>" class="btn btn-lg btn-theme btn-donate"><?php esc_html_e('donate now','charityheart') ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php if ( is_active_sidebar('about-us') ): ?>
    <div id="about-us-sidebar" class="widget-area clearfix hidden-sm hidden-xs">
        <div class="about-us-sidebar-wrapper">
            <?php dynamic_sidebar( 'about-us' ); ?>
        </div>
        <div class="about-us-sidebar-btn">
            <div class="close-text"><i class="mn-icon-4"></i></div>
        </div>
    </div>
    <div class="about-us-sidebar-panel-overlay"></div>
<?php endif; ?>