<?php
/**
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

?>

<h3><?php echo esc_html__('Dashboard', 'zilom') ?></h3>

<div class="tutor-dashboard-content-inner">
	<?php
	$enrolled_course = tutor_utils()->get_enrolled_courses_by_user();
	$completed_courses = tutor_utils()->get_completed_courses_ids_by_user();
	$total_students = tutor_utils()->get_total_students_by_instructor(get_current_user_id());
	$my_courses = tutor_utils()->get_courses_by_instructor(get_current_user_id(), 'publish');
	$earning_sum = tutor_utils()->get_earning_sum();

	$enrolled_course_count = $enrolled_course ? $enrolled_course->post_count : 0;
	$completed_course_count = count($completed_courses);
    $active_course_count = $enrolled_course_count - $completed_course_count;
    $active_course_count < 0 ? $active_course_count = 0 : 0;
    
	?>

    <div class="tutor-dashboard-info-cards">
        <div class="tutor-dashboard-info-card">
            <p>
                <span><?php echo esc_html__('Enrolled Courses', 'zilom'); ?></span>
                <span class="tutor-dashboard-info-val"><?php echo esc_html($enrolled_course_count); ?></span>
            </p>
        </div>
        <div class="tutor-dashboard-info-card">
            <p>
                <span><?php echo esc_html__('Active Courses', 'zilom'); ?></span>
                <span class="tutor-dashboard-info-val"><?php echo esc_html($active_course_count); ?></span>
            </p>
        </div>
        <div class="tutor-dashboard-info-card">
            <p>
                <span><?php echo esc_html__('Completed Courses', 'zilom'); ?></span>
                <span class="tutor-dashboard-info-val"><?php echo esc_html($completed_course_count); ?></span>
            </p>
        </div>

		<?php
		if(current_user_can(tutor()->instructor_role)) :
			?>
            <div class="tutor-dashboard-info-card">
                <p>
                    <span><?php echo esc_html__('Total Students', 'zilom'); ?></span>
                    <span class="tutor-dashboard-info-val"><?php echo esc_html($total_students); ?></span>
                </p>
            </div>
            <div class="tutor-dashboard-info-card">
                <p>
                    <span><?php echo esc_html__('Total Courses', 'zilom'); ?></span>
                    <span class="tutor-dashboard-info-val"><?php echo esc_html(count($my_courses)); ?></span>
                </p>
            </div>
            <div class="tutor-dashboard-info-card">
                <p>
                    <span><?php echo esc_html__('Total Earnings', 'zilom'); ?></span>
                    <span class="tutor-dashboard-info-val"><?php echo tutor_utils()->tutor_price($earning_sum->instructor_amount); ?></span>
                </p>
            </div>
		<?php
		endif;
		?>
    </div>

	<?php
	$instructor_course = tutor_utils()->get_courses_for_instructors(get_current_user_id());
	if(count($instructor_course)) {
		?>
        <div class="tutor-dashboard-info-table-wrap">
            <h3><?php echo esc_html__('Most Popular Courses', 'zilom'); ?></h3>
            <table class="tutor-dashboard-info-table">
                <thead>
                <tr>
                    <td><?php echo esc_html__('Course Name', 'zilom'); ?></td>
                    <td><?php echo esc_html__('Enrolled', 'zilom'); ?></td>
                    <td><?php echo esc_html__('Status', 'zilom'); ?></td>
                </tr>
                </thead>
                <tbody>
				<?php
				$instructor_course = tutor_utils()->get_courses_for_instructors(get_current_user_id());
				foreach ($instructor_course as $course){
                    $enrolled = tutor_utils()->count_enrolled_users_by_course($course->ID);
                    $course_status = ($course->post_status == 'publish') ? __('Published', 'zilom') : $course->post_status; ?>
                    <tr>
                        <td>
                            <a href="<?php echo get_the_permalink($course->ID); ?>" target="_blank"><?php echo esc_html($course->post_title); ?></a>
                        </td>
                        <td><?php echo esc_html($enrolled); ?></td>
                        <td>
                            <small class="label-course-status label-course-<?php echo esc_attr($course->post_status); ?>"> <?php echo esc_html($course_status, 'zilom'); ?></small>
                        </td>
                    </tr>
					<?php
				}
				?>
                </tbody>
            </table>
        </div>
	<?php } ?>

</div>