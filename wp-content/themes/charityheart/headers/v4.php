<header id="apus-header" class="apus-header header-v4 hidden-sm hidden-xs" role="banner">
    <div id="apus-topbar" class="apus-topbar">
        <div class="topbar-inner clearfix">
            <div class="container">
                <?php if ( charityheart_get_config('top_contact_info_v4') ): ?>
                    <div class="pull-left">
                        <?php echo trim(charityheart_get_config('top_contact_info_v4')); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'social' ) ) : ?>
                    <div class="pull-right">
                        <?php dynamic_sidebar( 'social' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="<?php echo (charityheart_get_config('keep_header') ? 'main-sticky-header-wrapper' : ''); ?>">
    <div class="header-main clearfix <?php echo (charityheart_get_config('keep_header') ? 'main-sticky-header' : ''); ?>">
        <div class="header-inner">
        <div class="main-menu">
            <div class="container">
                <div class="p-relative clearfix">
                    <div class="logo-in-theme pull-left">
                        <?php get_template_part( 'page-templates/parts/logo-green' ); ?>
                    </div>
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <div class="pull-left site-header-mainmenu ">
                                <nav data-duration="400" class="hidden-xs hidden-sm apus-megamenu slide animate navbar" role="navigation">
                                <?php
                                    $args = array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'collapse navbar-collapse',
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
                    <?php if( defined('CHARITYHEART_GIVE_ACTIVED') && CHARITYHEART_GIVE_ACTIVED && charityheart_get_config('show_donation_button', true) ){ ?>
                        <div class="donate pull-right">
                            <a href="<?php echo esc_url(get_post_type_archive_link( 'give_forms' )); ?>" class="btn btn-donate btn-theme"><?php esc_html_e('donate now','charityheart') ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</header>