<div id="apus-header-mobile" class="header-mobile hidden-lg hidden-md clearfix">
    <div class="container">
    <div class="row">
        <div class="col-xs-3">
            <div class="sidebar-mobile clearfix">
                <div class="active-mobile pull-left">
                    <button data-toggle="offcanvas" class="btn btn-sm btn-danger btn-offcanvas btn-toggle-canvas offcanvas" type="button">
                       <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <?php
                $logo = charityheart_get_config('media-mobile-logo');
            ?>

            <?php if( isset($logo['url']) && !empty($logo['url']) ): ?>
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                        <img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                </div>
            <?php else: ?>
                <div class="logo logo-theme">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                        <img src="<?php echo esc_url_raw( get_template_directory_uri().'/images/logo-mobile.jpg'); ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-xs-3">
            <div class="sidebar-mobile clearfix">
                <div class="search-popup  pull-right">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-primary btn-outline dropdown-toggle" type="button" data-toggle="dropdown"><span class="fa fa-search"></span></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php get_template_part( 'page-templates/parts/productsearchform' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="overflow-wrapper-canvas">
</div>