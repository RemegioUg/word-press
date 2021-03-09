<header id="apus-header" class="apus-header header-v1 hidden-sm hidden-xs" role="banner">
    <div class="header-top">
        <div class="container">
            <div class="pull-left">
                <div class="logo-in-theme ">
                    <?php get_template_part( 'page-templates/parts/logo-white' ); ?>
                </div>
            </div>
            <div class="pull-right top-header-right">
                <?php if ( is_active_sidebar('social') ): ?>
                    <div class="pull-right">
                        <?php dynamic_sidebar('social'); ?>
                    </div>
                <?php endif; ?>
                <?php if ( charityheart_get_config('top_contact_info_v1') ): ?>
                    <div class="pull-right">
                        <?php echo trim(charityheart_get_config('top_contact_info_v1')); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="header-middle <?php echo (charityheart_get_config('keep_header') ? 'main-sticky-header-wrapper' : ''); ?>">
        <div class="<?php echo (charityheart_get_config('keep_header') ? 'main-sticky-header' : ''); ?>">
            <div class="header-inner">
                <div class="container">
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
                        <?php if( defined('CHARITYHEART_GIVE_ACTIVED') && CHARITYHEART_GIVE_ACTIVED && charityheart_get_config('show_donation_button', true) ){ ?>
                            <div class="donate pull-right">
                                <a href="<?php echo esc_url(get_post_type_archive_link( 'give_forms' )); ?>" class="btn btn-lg btn-theme btn-outline btn-donate"><?php esc_html_e('donate now','charityheart') ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>