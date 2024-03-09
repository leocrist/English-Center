<?php
/**
 * Template for displaying course reviews
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.5
 */


do_action('tutor_course/single/enrolled/before/reviews');

$disable = get_tutor_option('disable_course_review');
if ($disable){
    return;
}

$reviews = tutor_utils()->get_course_reviews();
if ( ! is_array($reviews) || ! count($reviews)){
    return;
}

$rating = tutor_utils()->get_course_rating();
?>

<div class="tutor-single-course-segment">
    <div class="course-student-rating-title">
        <h4 class="tutor-segment-title" style="margin-top:40px; font-weight: 700;"><?php echo esc_html__('Phản hồi từ học viên', 'zilom'); ?></h4>
    </div>
    <div class="tutor-course-reviews-wrap">
        <div class="tutor-course-student-rating-wrap">
            <div class="course-avg-rating-wrap">
                <div class="tutor-row tutor-align-items-center">
            
                    <div class="tutor-col">
                        <div class="course-ratings-count-meter-wrap">
                            <?php
                            foreach ($rating->count_by_value as $key => $value){
                                $rating_count_percent = ($value > 0) ? ($value  * 100 ) / $rating->rating_count : 0;
                                ?>
                                <div class="course-rating-meter">
                                    <div class="rating-meter-col rating-label">
                                        
                                        <?php 
                                            switch ($key) {
                                                case 5:
                                                    echo esc_html__('Xuất xắc', 'zilom');
                                                    break;
                                                case 4:
                                                    echo esc_html__('Rất tốt', 'zilom');
                                                    break;
                                                case 3:
                                                    echo esc_html__('Trung bình', 'zilom');
                                                    break;
                                                case 2:
                                                    echo esc_html__('Tệ', 'zilom');
                                                    break;
                                                case 1:
                                                    echo esc_html__('Rất tệ', 'zilom');
                                                    break;
                                            }

                                        ?>
                                            
                                    </div>
                                    <div class="rating-meter-col rating-meter-bar-wrap">
                                        <div class="rating-meter-bar">
                                            <div class="rating-meter-fill-bar" style="width: <?php echo esc_attr($rating_count_percent); ?>%;"></div>
                                        </div>
                                    </div>
                                    <div class="rating-meter-col rating-text-col">
                                        <?php echo esc_html($value); ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tutor-col-auto">
                        <div class="avg-rating-content">
                            <div class="course-avg-rating">
                                <?php echo number_format($rating->rating_avg, 1); ?>
                            </div>
                            <div class="course-avg-rating-html">
                                <?php tutor_utils()->star_rating_generator($rating->rating_avg);?>
                            </div>
                            <div class="avg-rating-total">
                                <?php echo esc_html($rating->rating_count); ?>
                                <?php 
                                    if($rating->rating_count == 1){
                                        echo esc_html__('Đánh giá', 'zilom');
                                    }else{
                                        echo esc_html__('Đánh giá', 'zilom');
                                    }
                                ?>    
                            </div>
                        </div>    
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>

<?php do_action('tutor_course/single/enrolled/after/reviews'); ?>
