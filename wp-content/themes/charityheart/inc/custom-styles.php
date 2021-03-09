<?php

if ( !function_exists ('charityheart_custom_styles') ) {
	function charityheart_custom_styles() {
		global $post;	
		
		ob_start();	
		?>
		
		<!-- ******************************************************************** -->
		<!-- * Theme Options Styles ********************************************* -->
		<!-- ******************************************************************** -->
			
		<style>
			/* Typography */
			/* Main Font */
			<?php
				$font_source = charityheart_get_config('font_source');
				$main_font = charityheart_get_config('main_font');
				$main_font = isset($main_font['font-family']) ? $main_font['font-family'] : false;
				$main_google_font_face = charityheart_get_config('main_google_font_face');
			?>
			<?php if ( ($font_source == "1" && $main_font) || ($font_source == "2" && $main_google_font_face) ): ?>
				h1, h2, h3, h4, h5, h6, .widget-title,.widgettitle
				{
					font-family: 
					<?php if ( $font_source == "2" ) echo '\'' . $main_google_font_face . '\','; ?>
					<?php if ( $font_source == "1" ) echo '\'' . $main_font . '\','; ?> 
					sans-serif;
				}
			<?php endif; ?>
			/* Second Font */
			<?php
				$secondary_font = charityheart_get_config('secondary_font');
				$secondary_font = isset($secondary_font['font-family']) ? $secondary_font['font-family'] : false;
				$secondary_google_font_face = charityheart_get_config('secondary_google_font_face');
			?>
			<?php if ( ($font_source == "1" && $secondary_font) || ($font_source == "2" && $secondary_google_font_face) ): ?>
				body,
				p
				{
					font-family: 
					<?php if ( $font_source == "2" ) echo '\'' . $secondary_google_font_face . '\','; ?>
					<?php if ( $font_source == "1" ) echo '\'' . $secondary_font . '\','; ?> 
					sans-serif;
				}			
			<?php endif; ?>

			/* Custom Color (skin) */ 

			/* check main color */ 
			<?php if ( charityheart_get_config('main_color') != "" ) : ?>
				/* style special*/
				.apus-page-loading #loader:before,
				.apus-page-loading #loader:after,
				.apus-page-loading #loader{
					border-top-color:<?php echo esc_html( charityheart_get_config('main_color') ) ?>;
				}
				/* seting background main */
				.apus-header .apus-search-form:hover .button-search,
				.apus-search-form .button-search:hover, .apus-search-form .button-search:active,
				.give-grid.grid-v2:hover .give-btn,
				.give-grid.grid-v2 .give-goal-progress .give-progress-bar .dot::before,
				.give-grid.grid-v2 .give-goal-progress .give-progress-bar .dot::before,
				.give-progress-bar > span,
				.header-v3 .navbar-nav.megamenu > li:hover > a::before, .header-v3 .navbar-nav.megamenu > li:active > a::before, .header-v3 .navbar-nav.megamenu > li.active > a::before, .header-v3 .navbar-nav.megamenu > li.open > a::before,
				.header-v2 .navbar-nav.megamenu > li:hover > a, .header-v2 .navbar-nav.megamenu > li:active > a, .header-v2 .navbar-nav.megamenu > li.active > a, .header-v2 .navbar-nav.megamenu > li.open > a,
				.sidebar .widget .widgettitle::before, .sidebar .widget .widget-title::before, .apus-sidebar .widget .widgettitle::before, .apus-sidebar .widget .widget-title::before,
				.skew-theme-right::before,
				.skew-theme-right::after,
				.flow-theme-top-bottom-right::after,
				.skew-theme-right,
				.header-v3 .logo-in-theme::before,
				.header-v3 .logo-in-theme::after,
				.header-v3 .logo-in-theme,
				.widget-newletter.fullbutton [type="submit"],
				.volunteer-grid.style3 .volunteer-content,
				.widget-gallery.light .popup-image::before,
				.volunteer-grid.style2:hover .volunteer-content,
				.widget-text-heading.color .title::before, .widget-text-heading.square .title::before,
				.widget-testimonials .testimonials-v1 .testimonial-avatar::before,
				.date-info .moth,
				.bg-theme,
				.apus-pagination > span:hover, .apus-pagination > span.current, .apus-pagination > a:hover, .apus-pagination > a.current,
				form[id*="give-form"] #give-final-total-wrap .give-donation-total-label, form[id*="give-form"] .give-donation-amount .give-currency-symbol,
				.single-give .summary .give-btn
				{
					background: <?php echo esc_html( charityheart_get_config('main_color') ) ?> !important;
				}
				/* setting color*/
				.widget-features-box.circle .feature-box:hover .ourservice-heading,
				.header-v3 .navbar-nav.megamenu > li:hover > a, .header-v3 .navbar-nav.megamenu > li:active > a, .header-v3 .navbar-nav.megamenu > li.active > a, .header-v3 .navbar-nav.megamenu > li.open > a,
				.owl-carousel .owl-controls .owl-nav .owl-prev:hover, .owl-carousel .owl-controls .owl-nav .owl-next:hover,
				.question,
				.event-grid .event-info .date .day,
				.apus-breadscrumb .breadcrumb a,
				.give-list-v3 .total-goal .goal-text-wrapper,
				.give-special .total-sales .income, .give-special .total-goal .income,
				.widget-contact .info > span,
				.widget-social .social > li a:hover,
				.btn-link,
				.btn-link:hover,
				.btn-link:active,
				.time-top .item-icon,
				.widget-introduction .title,
				.widget-introduction .name,
				.event-style4 .date-info .day,
				.apus-footer .slogan,
				.widget-action.style3 .title,
				.btn-readmore,
				a:hover,a:active,
				.apus-footer .widget-title, .apus-footer .widgettitle, .apus-footer .widget-heading,
				.post-list.style1 .date,
				.widget-action.style2 .title,
				.counters .counter,
				.widget-action.style1 .title,
				.goal-text,
				.single-give .single-post .total-goal .goal-text-wrapper{
					color: <?php echo esc_html( charityheart_get_config('main_color') ) ?>;
				}
				.give-grid:hover .give-btn,
				.vc_tta-accordion.vc_tta-style-classic .vc_active .vc_tta-panel-title a,
				.text-theme{
					color: <?php echo esc_html( charityheart_get_config('main_color') ) ?> !important;
				}
				/* setting border color*/
				.apus-header .apus-search-form:hover .button-search,
				.apus-search-form .button-search:hover, .apus-search-form .button-search:active,
				.give-grid.grid-v2:hover .give-btn,
				.widget-social .social > li a:hover,
				.widget-gallery.border .image:hover, .widget-gallery.border .image:active,
				.widget-newletter.fullbutton .form-control,
				.widget-newletter.fullbutton [type="submit"],
				.widget-features-box.white .fbox-icon,
				.counters .icon,
				.border-top-theme,
				.apus-pagination > span:hover, .apus-pagination > span.current, .apus-pagination > a:hover, .apus-pagination > a.current,
				form[id*="give-form"] #give-final-total-wrap .give-final-total-amount, form[id*="give-form"] .give-donation-amount #give-amount,
				form[id*="give-form"] #give-final-total-wrap .give-donation-total-label, form[id*="give-form"] .give-donation-amount .give-currency-symbol,
				.single-give .summary .give-btn
				{
					border-color: <?php echo esc_html( charityheart_get_config('main_color') ) ?> !important;
				}
				.widget_apus_instagram .instagram-pics a:hover, .widget_apus_instagram .instagram-pics a:active{
					outline:8px solid <?php echo esc_html( charityheart_get_config('main_color') ) ?>;
				}

			<?php endif; ?>


			<?php if ( charityheart_get_config('button_color') != "" ) : ?>
				.give-special .give-btn-modal, 
				.btn-theme.btn-outline 
				{
					color: <?php echo esc_html( charityheart_get_config('button_color') ) ?> !important;
				}
				/* check second background color */

				.btn-theme, .single-give .summary .give-btn
				{
					background-color: <?php echo esc_html( charityheart_get_config('button_color') ) ?> !important;
				}
				.give-special .give-btn-modal, .single-give .summary .give-btn,
				.btn-theme
				{
					border-color: <?php echo esc_html( charityheart_get_config('button_color') ) ?> !important;
				}
			<?php endif; ?>

			<?php if ( charityheart_get_config('button_hover_color') != "" ) : ?>
				.hh
				{
					color: <?php echo esc_html( charityheart_get_config('button_hover_color') ) ?> !important;
				}
				/* check second background color */
				.give-special .give-btn-modal:hover, .give-special .give-btn-modal:active,
				.btn-theme.btn-outline:hover, .btn-theme.btn-outline:active,
				.btn-theme:hover, .btn-theme:focus, .btn-theme:active
				{
					background-color: <?php echo esc_html( charityheart_get_config('button_hover_color') ) ?> !important;
				}
				.give-special .give-btn-modal:hover, .give-special .give-btn-modal:active,
				.btn-outline.btn-themes:hover,
				.btn-outline.btn-themes:active,
				.btn-theme:hover,
				.btn-theme:active
				{
					border-color: <?php echo esc_html( charityheart_get_config('button_hover_color') ) ?> !important;
				}
			<?php endif; ?>

			/***************************************************************/
			/* Top Bar *****************************************************/
			/***************************************************************/
			/* Top Bar Backgound */
			<?php $topbar_bg = charityheart_get_config('topbar_bg'); ?>
			<?php if ( !empty($topbar_bg) ) :
				$image = isset($topbar_bg['background-image']) ? str_replace(array('http://', 'https://'), array('//', '//'), $topbar_bg['background-image']) : '';
				$topbar_bg_image = $image && $image != 'none' ? 'url('.esc_url($image).')' : $image;
			?>
				#apus-topbar {
					<?php if ( isset($topbar_bg['background-color']) && $topbar_bg['background-color'] ): ?>
				    background-color: <?php echo esc_html( $topbar_bg['background-color'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($topbar_bg['background-repeat']) && $topbar_bg['background-repeat'] ): ?>
				    background-repeat: <?php echo esc_html( $topbar_bg['background-repeat'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($topbar_bg['background-size']) && $topbar_bg['background-size'] ): ?>
				    background-size: <?php echo esc_html( $topbar_bg['background-size'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($topbar_bg['background-attachment']) && $topbar_bg['background-attachment'] ): ?>
				    background-attachment: <?php echo esc_html( $topbar_bg['background-attachment'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($topbar_bg['background-position']) && $topbar_bg['background-position'] ): ?>
				    background-position: <?php echo esc_html( $topbar_bg['background-position'] ) ?>;
				    <?php endif; ?>
				    <?php if ( $topbar_bg_image ): ?>
				    background-image: <?php echo esc_html( $topbar_bg_image ) ?>;
				    <?php endif; ?>
				}
			<?php endif; ?>
			/* Top Bar Color */
			<?php if ( charityheart_get_config('topbar_text_color') != "" ) : ?>
				#apus-topbar {
					color: <?php echo esc_html(charityheart_get_config('topbar_text_color')); ?>;
				}
			<?php endif; ?>
			/* Top Bar Link Color */
			<?php if ( charityheart_get_config('topbar_link_color') != "" ) : ?>
				#apus-topbar a {
					color: <?php echo esc_html(charityheart_get_config('topbar_link_color')); ?>;
				}
			<?php endif; ?>

			/***************************************************************/
			/* Header *****************************************************/
			/***************************************************************/
			/* Header Backgound */
			<?php $header_bg = charityheart_get_config('header_bg'); ?>
			<?php if ( !empty($header_bg) ) :
				$image = isset($header_bg['background-image']) ? str_replace(array('http://', 'https://'), array('//', '//'), $header_bg['background-image']) : '';
				$header_bg_image = $image && $image != 'none' ? 'url('.esc_url($image).')' : $image;
			?>	

				.header-default .sticky-header .header-inner,
				.header-v4 .sticky-header .header-inner,
				#apus-header .header-top,
				#apus-header .header-middle,
				#apus-header {
					<?php if ( isset($header_bg['background-color']) && $header_bg['background-color'] ): ?>
				    background-color: <?php echo esc_html( $header_bg['background-color'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($header_bg['background-repeat']) && $header_bg['background-repeat'] ): ?>
				    background-repeat: <?php echo esc_html( $header_bg['background-repeat'] ) ?>;
				    <?php endif; ?>s
				    <?php if ( isset($header_bg['background-size']) && $header_bg['background-size'] ): ?>
				    background-size: <?php echo esc_html( $header_bg['background-size'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($header_bg['background-attachment']) && $header_bg['background-attachment'] ): ?>
				    background-attachment: <?php echo esc_html( $header_bg['background-attachment'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($header_bg['background-position']) && $header_bg['background-position'] ): ?>
				    background-position: <?php echo esc_html( $header_bg['background-position'] ) ?>;
				    <?php endif; ?>
				    <?php if ( $header_bg_image ): ?>
				    background-image: <?php echo esc_html( $header_bg_image ) ?>;
				    <?php endif; ?>
				}
			<?php endif; ?>
			/* Header Color */
			<?php if ( charityheart_get_config('header_text_color') != "" ) : ?>
				#apus-header {
					color: <?php echo esc_html(charityheart_get_config('header_text_color')); ?>;
				}
			<?php endif; ?>
			/* Header Link Color */
			<?php if ( charityheart_get_config('header_link_color') != "" ) : ?>
				#apus-header a {
					color: <?php echo esc_html(charityheart_get_config('header_link_color'));?> ;
				}
			<?php endif; ?>
			/* Header Link Color Active */
			<?php if ( charityheart_get_config('header_link_color_active') != "" ) : ?>
				#apus-header .active > a,
				#apus-header a:active,
				#apus-header a:hover {
					color: <?php echo esc_html(charityheart_get_config('header_link_color_active')); ?>;
				}
			<?php endif; ?>

			/* Menu Link Color */
			<?php if ( charityheart_get_config('main_menu_link_color') != "" ) : ?>
				.navbar-nav.megamenu > li > a{
					color: <?php echo esc_html(charityheart_get_config('main_menu_link_color'));?> !important;
				}
			<?php endif; ?>
			
			/* Menu Link Color Active */
			<?php if ( charityheart_get_config('main_menu_link_color_active') != "" ) : ?>
				.navbar-nav.megamenu > li:hover > a,
				.navbar-nav.megamenu > li.active > a,
				.navbar-nav.megamenu > li > a:hover,
				.navbar-nav.megamenu > li > a:active
				{
					color: <?php echo esc_html(charityheart_get_config('main_menu_link_color_active')); ?> !important;
				}
			<?php endif; ?>

			/***************************************************************/
			/* Footer *****************************************************/
			/***************************************************************/
			/* Footer Backgound */
			<?php $footer_bg = charityheart_get_config('footer_bg'); ?>
			<?php if ( !empty($footer_bg) ) :
				$image = isset($footer_bg['background-image']) ? str_replace(array('http://', 'https://'), array('//', '//'), $footer_bg['background-image']) : '';
				$footer_bg_image = $image && $image != 'none' ? 'url('.esc_url($image).')' : $image;
			?>
				#apus-footer {
					<?php if ( isset($footer_bg['background-color']) && $footer_bg['background-color'] ): ?>
				    background-color: <?php echo esc_html( $footer_bg['background-color'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($footer_bg['background-repeat']) && $footer_bg['background-repeat'] ): ?>
				    background-repeat: <?php echo esc_html( $footer_bg['background-repeat'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($footer_bg['background-size']) && $footer_bg['background-size'] ): ?>
				    background-size: <?php echo esc_html( $footer_bg['background-size'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($footer_bg['background-attachment']) && $footer_bg['background-attachment'] ): ?>
				    background-attachment: <?php echo esc_html( $footer_bg['background-attachment'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($footer_bg['background-position']) && $footer_bg['background-position'] ): ?>
				    background-position: <?php echo esc_html( $footer_bg['background-position'] ) ?>;
				    <?php endif; ?>
				    <?php if ( $footer_bg_image ): ?>
				    background-image: <?php echo esc_html( $footer_bg_image ) ?>;
				    <?php endif; ?>
				}
			<?php endif; ?>
			/* Footer Heading Color*/
			<?php if ( charityheart_get_config('footer_heading_color') != "" ) : ?>
				#apus-footer h1, #apus-footer h2, #apus-footer h3, #apus-footer h4, #apus-footer h5, #apus-footer h6 ,#apus-footer .widget-title {
					color: <?php echo esc_html(charityheart_get_config('footer_heading_color')); ?> !important;
				}
			<?php endif; ?>
			/* Footer Color */
			<?php if ( charityheart_get_config('footer_text_color') != "" ) : ?>
				#apus-footer {
					color: <?php echo esc_html(charityheart_get_config('footer_text_color')); ?>;
				}
			<?php endif; ?>
			/* Footer Link Color */
			<?php if ( charityheart_get_config('footer_link_color') != "" ) : ?>
				#apus-footer a {
					color: <?php echo esc_html(charityheart_get_config('footer_link_color')); ?>;
				}
			<?php endif; ?>

			/* Footer Link Color Hover*/
			<?php if ( charityheart_get_config('footer_link_color_hover') != "" ) : ?>
				#apus-footer a:hover {
					color: <?php echo esc_html(charityheart_get_config('footer_link_color_hover')); ?>;
				}
			<?php endif; ?>




			/***************************************************************/
			/* Copyright *****************************************************/
			/***************************************************************/
			/* Copyright Backgound */
			<?php $copyright_bg = charityheart_get_config('copyright_bg'); ?>
			<?php if ( !empty($copyright_bg) ) :
				$image = isset($copyright_bg['background-image']) ? str_replace(array('http://', 'https://'), array('//', '//'), $copyright_bg['background-image']) : '';
				$copyright_bg_image = $image && $image != 'none' ? 'url('.esc_url($image).')' : $image;
			?>
				.apus-copyright {
					<?php if ( isset($copyright_bg['background-color']) && $copyright_bg['background-color'] ): ?>
				    background-color: <?php echo esc_html( $copyright_bg['background-color'] ) ?> !important;
				    <?php endif; ?>
				    <?php if ( isset($copyright_bg['background-repeat']) && $copyright_bg['background-repeat'] ): ?>
				    background-repeat: <?php echo esc_html( $copyright_bg['background-repeat'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($copyright_bg['background-size']) && $copyright_bg['background-size'] ): ?>
				    background-size: <?php echo esc_html( $copyright_bg['background-size'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($copyright_bg['background-attachment']) && $copyright_bg['background-attachment'] ): ?>
				    background-attachment: <?php echo esc_html( $copyright_bg['background-attachment'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($copyright_bg['background-position']) && $copyright_bg['background-position'] ): ?>
				    background-position: <?php echo esc_html( $copyright_bg['background-position'] ) ?>;
				    <?php endif; ?>
				    <?php if ( $copyright_bg_image ): ?>
				    background-image: <?php echo esc_html( $copyright_bg_image ) ?> !important;
				    <?php endif; ?>
				}
			<?php endif; ?>

			/* Footer Color */
			<?php if ( charityheart_get_config('copyright_text_color') != "" ) : ?>
				.apus-copyright {
					color: <?php echo esc_html(charityheart_get_config('copyright_text_color')); ?>;
				}
			<?php endif; ?>
			/* Footer Link Color */
			<?php if ( charityheart_get_config('copyright_link_color') != "" ) : ?>
				.apus-copyright a {
					color: <?php echo esc_html(charityheart_get_config('copyright_link_color')); ?>;
				}
			<?php endif; ?>

			/* Footer Link Color Hover*/
			<?php if ( charityheart_get_config('copyright_link_color_hover') != "" ) : ?>
				.apus-copyright a:hover {
					color: <?php echo esc_html(charityheart_get_config('copyright_link_color_hover')); ?>;
				}
			<?php endif; ?>

			/* Woocommerce Breadcrumbs */
			<?php if ( charityheart_get_config('breadcrumbs') == "0" ) : ?>
			.woocommerce .woocommerce-breadcrumb,
			.woocommerce-page .woocommerce-breadcrumb
			{
				display:none;
			}
			<?php endif; ?>

			/* Custom CSS */
			<?php if ( charityheart_get_config('custom_css') != "" ) : ?>
				<?php echo charityheart_get_config('custom_css') ?>
			<?php endif; ?>

		</style>

	<?php
		$content = ob_get_clean();
		$content = str_replace(array("\r\n", "\r"), "\n", $content);
		$lines = explode("\n", $content);
		$new_lines = array();
		foreach ($lines as $i => $line) {
			if (!empty($line)) {
				$new_lines[] = trim($line);
			}
		}
		
		echo implode($new_lines);
	}
}

add_action( 'wp_head', 'charityheart_custom_styles', 99 );
