<?php

/**
 * Course loop price
 *
 * @since v.1.0.0
 * @author themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */
?>
<?php
$course_id = get_the_ID();
?>
<div class="course-loop-price" style="display:none;">
    <?php
        $default_price = apply_filters('tutor-loop-default-price', esc_html__('Free', 'zilom'));
        $price_html = '<div class="price"> ' . $default_price . '</div>';
        if (tutor_utils()->is_course_purchasable()) {
           $product_id = tutor_utils()->get_course_product_id($course_id);
           $product    = wc_get_product( $product_id );
           if ( $product ) {
              $price_html = '<div class="price">'. $product->get_price_html() . ' </div>';
           }
        }
       echo wp_kses($price_html, true);
    ?>
</div>