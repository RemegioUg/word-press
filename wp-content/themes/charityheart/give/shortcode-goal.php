<?php
/**
 * This template is used to display the goal with [give_goal]
 */

$goal_option = get_post_meta( $form_id, '_give_goal_option', true );
$form        = new Give_Donate_Form( $form_id );
$goal        = $form->goal;
$goal_format = get_post_meta( $form_id, '_give_goal_format', true );
$income      = $form->get_earnings();
$color       = get_post_meta( $form_id, '_give_goal_color', true );
$show_text   = isset( $args['show_text'] ) ? filter_var( $args['show_text'], FILTER_VALIDATE_BOOLEAN ) : true;
$show_bar    = isset( $args['show_bar'] ) ? filter_var( $args['show_bar'], FILTER_VALIDATE_BOOLEAN ) : true;

//Sanity check - respect shortcode args
if ( isset( $args['show_goal'] ) && $args['show_goal'] === false ) {
    return false;
}

//Sanity check - ensure form has goal set to output
if ( empty( $form->ID )
    || ( is_singular( 'give_forms' ) && ! give_is_setting_enabled( $goal_option ) )
    || ! give_is_setting_enabled( $goal_option )
    || $goal == 0
) {
    //not this form, bail
    return false;
}

$progress = round( ( $income / $goal ), 2 );
$progress_per = round( ( $income / $goal ) * 100, 2 );

$version = isset($args['version']) ? $args['version'] : '';
if ($version == 'v1') {
    
    if ( $income >= $goal ) {
        $progress = 1;
    }

    ?>
    <div class="give-goal-progress">
        
        <?php if ( ! empty( $show_bar ) ) : ?>
            <div class="progress-bar-circle" data-value="<?php  echo esc_attr( $progress ); ?>" data-size="80" data-thickness="6" data-reverse="false" data-color="<?php echo esc_attr($color); ?>">
                <div class="raised" style="color: <?php echo esc_attr($color); ?>">
                    <?php
                    echo sprintf(__( '%1$s', 'charityheart' ),
                        '<span class="give-percentage">' . apply_filters( 'give_goal_amount_funded_percentage_output', round( $progress_per ) ). '<sup>%</sup>' . '</span>'
                    );
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $show_text ) ) : ?>
            <div class="total-goal">
                <?php
                // Get formatted amount.
                $income = give_human_format_large_amount( give_format_amount( $income ) );
                $goal = give_human_format_large_amount( give_format_amount( $goal ) );

                echo sprintf(
                    __( '<span class="goal-income-wrapper">Raised: %1$s</span><span class="goal-text-wrapper">Goal: %2$s</span>', 'charityheart' ),
                    '<span class="income">' . apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ) . '</span>',
                    '<span class="goal-text">' . apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal ) ) . '</span>'
                );
                ?>
            </div>
        <?php endif; ?>
    </div><!-- /.goal-progress -->
<?php } elseif ($version == 'v2') {
    
    $progress = round( ( $income / $goal ) * 100, 2 );

    if ( $income >= $goal ) {
        $progress = 100;
    }
    ?>
    <div class="give-goal-progress ">
        
        <?php if ( ! empty( $show_bar ) ) : ?>
            <div class="give-progress-bar <?php if($progress === 100) echo 'done'; ?>">
                <span class="line" style="width: <?php  echo esc_attr( $progress ); ?>%;<?php if ( ! empty( $color ) )  echo 'background-color:' . $color; ?>"></span>
                <span class="dot" style="margin-left: <?php  echo esc_attr( $progress ); ?>%;<?php if ( ! empty( $color ) )  echo 'background-color:' . $color; ?>">
                    <?php
                    echo sprintf(__( '%s%%', 'charityheart' ),
                        '<span class="give-percentage">' . apply_filters( 'give_goal_amount_funded_percentage_output', round( $progress_per ) ) . '</span>'
                    );
                    ?>
                </span>

            </div><!-- /.give-progress-bar -->
        <?php endif; ?>

    </div><!-- /.goal-progress -->

<?php } elseif ($version == 'v3') {
    
if ( $income >= $goal ) {
        $progress = 1;
    }

    ?>
    <div class="give-goal-progress">
        
        <?php if ( ! empty( $show_bar ) ) : ?>
            <div class="progress-bar-circle" data-value="<?php  echo esc_attr( $progress ); ?>" data-size="80" data-thickness="6" data-reverse="false" data-color="<?php echo esc_attr($color); ?>">
                <div class="raised" style="color: <?php echo esc_attr($color); ?>">
                    <?php
                    echo sprintf(__( '%1$s', 'charityheart' ),
                        '<span class="give-percentage">' . apply_filters( 'give_goal_amount_funded_percentage_output', round( $progress_per ) ). '<sup>%</sup>' . '</span>'
                    );
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div><!-- /.goal-progress -->

<?php } else {

    $progress = round( ( $income / $goal ) * 100, 2 );

    if ( $income >= $goal ) {
        $progress = 100;
    }
    ?>
    <div class="give-goal-progress ">
        
        <?php if ( ! empty( $show_bar ) ) : ?>
            <div class="give-progress-bar <?php if($progress === 100) echo 'done'; ?>">
                <span class="line" style="width: <?php  echo esc_attr( $progress ); ?>%;<?php if ( ! empty( $color ) )  echo 'background-color:' . $color; ?>">
                    <?php
                    echo sprintf(__( '%s%%', 'charityheart' ),
                        '<span class="give-percentage">' . apply_filters( 'give_goal_amount_funded_percentage_output', round( $progress_per ) ) . '</span>'
                    );
                    ?>
                    &nbsp;
                </span>
            </div><!-- /.give-progress-bar -->
        <?php endif; ?>

        <?php if ( ! empty( $show_text ) ) : ?>
            <div class="total-goal">
                <?php
                    // Get formatted amount.
                    $income = give_human_format_large_amount( give_format_amount( $income ) );
                    $goal = give_human_format_large_amount( give_format_amount( $goal ) );

                    echo sprintf(
                        __( '<span class="goal-income-wrapper">Raised: %1$s</span><span class="goal-text-wrapper">Goal: %2$s</span>', 'charityheart' ),
                        '<span class="income">' . apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ) . '</span>',
                        '<span class="goal-text">' . apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal ) ) . '</span>'
                    );
                ?>
            </div>
        <?php endif; ?>

    </div><!-- /.goal-progress -->
<?php } ?>