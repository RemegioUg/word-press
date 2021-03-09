<?php

class Charityheart_Donations extends Apus_Widget {
    public function __construct() {
        parent::__construct(
            'apus_donations',
            esc_html__('Apus Donations Widget', 'charityheart'),
            array( 'description' => esc_html__( 'Show list of donations', 'charityheart' ), )
        );
        $this->widgetName = 'recent_donations';
    }

    public function getTemplate() {
        $this->template = 'donations.php';
    }

    public function widget( $args, $instance ) {
        $this->display($args, $instance);
    }
    
    public function form( $instance ) {
        $defaults = array(
            'title' => 'Latest Denations',
            'type' => 'latest' ,
            'number_post' => '4',
            'grid_style' => 'default'
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'charityheart' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('type')); ?>">
                <?php echo esc_html__('Type:', 'charityheart' ); ?>
            </label>
            <br>
            <select id="<?php echo esc_attr($this->get_field_id('type')); ?>" name="<?php echo esc_attr($this->get_field_name('type')); ?>">
                <option value="<?php echo esc_attr( 'latest' ); ?>" <?php selected($instance['type'],'latest'); ?> ><?php echo esc_html_e( 'Latest', 'charityheart' ); ?></option>
                <option value="<?php echo esc_attr( 'featured' ); ?>" <?php selected($instance['type'],'featured'); ?> ><?php echo esc_html_e( 'Featured', 'charityheart' ); ?></option>  
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'number_post' )); ?>"><?php esc_html_e( 'Limit:', 'charityheart' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_post' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number_post' )); ?>" type="text" value="<?php echo esc_attr($instance['number_post']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('grid_style')); ?>">
                <?php echo esc_html__('Type:', 'charityheart' ); ?>
            </label>
            <br>
        </p>
<?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['type'] = $new_instance['type'];
        $instance['number_post'] = ( ! empty( $new_instance['number_post'] ) ) ? strip_tags( $new_instance['number_post'] ) : '';
        return $instance;

    }
}

register_widget( 'Charityheart_Donations' );