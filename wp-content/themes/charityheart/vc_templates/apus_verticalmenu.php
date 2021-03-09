<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$nav_menu = ( $menu !='' ) ? wp_get_nav_menu_object( $menu ) : false;
if(!$nav_menu) return false;
$position_class = ($position=='left') ? 'menu-left' : 'menu-right';
$args = array(
    'menu' => $nav_menu,
    'container_class' => 'collapse navbar-collapse navbar-ex1-collapse apus-vertical-menu '.$position_class,
    'menu_class' => 'nav navbar-nav navbar-vertical-mega',
    'fallback_cb' => '',
    'walker' => new Charityheart_Nav_Menu()
);
?>

<aside class="widget <?php echo esc_attr( $el_class ) ; ?> widget_apus_vertical_menu <?php echo ($style != '') ? esc_attr($style) :''; ?>">
    <?php if ($title!=''): ?>
        <h3 class="widget-title visual-title"><i class="fa fa-bars"></i><span><?php echo trim($title); ?></span></h3>
    <?php endif; ?>
    <div class="widget-content">
        <?php wp_nav_menu($args); ?>
    </div>
</aside>