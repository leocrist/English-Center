<?php
   use Elementor\Group_Control_Image_Size;
   use Elementor\Icons_Manager;

   $image_id = $banner['image']['id']; 
   $image_url = $banner['image']['url'];
   if($image_id){
      $attach_url = Group_Control_Image_Size::get_attachment_image_src($image_id, 'image', $settings);
      if($attach_url) $image_url = $attach_url;
   }

   $taxonomy = $settings['taxonomy'] ? $settings['taxonomy'] : 'course-category'; 
   $term = $link_term = false;
   if( !empty($banner['term_slug']) ){
      $term = get_term_by( 'slug', $banner['term_slug'], $taxonomy );
      if($term){
         $link_term = get_term_link( $term->term_id, $taxonomy );
      }
   }
   $target = '';
   if( !empty($banner['custom_link']['url']) ){ 
      $link_term = $banner['custom_link']['url'];
      if($banner['custom_link']['is_external']){
         $target = 'target="_blank"';
      }
   }

   $has_icon = ! empty( $banner['selected_icon']['value']); 


?>

<div class="item banner-group-item">
   <div class="banner-item-content">
      
      <?php if($image_url){ ?>
         <div class="banner-image">

            <span class="background" style="background-image: url('<?php echo esc_url($image_url) ?>')"></span>

            <?php if ( $has_icon ){ ?>
               <span class="box-icon">
                  <?php Icons_Manager::render_icon( $banner['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
               </span>
            <?php } ?>

            <?php 
               if ( $settings['show_number_content'] == 'yes' && $term ) {
                  if(!empty($banner['term_slug'])){
                     echo '<div class="number-course">' . $term->count . ' ' . $settings['text_suffix_number'] . '</div>';
                  }
               } 
            ?>
         </div>
      <?php } ?>

      <div class="banner-content">
         <?php if($banner['title']){ ?>
            <h3 class="title"><?php echo $banner['title'] ?></h3>
         <?php } ?>
         <?php if($banner['sub_title']){ ?>
            <div class="sub-title"><?php echo $banner['sub_title'] ?></div>
         <?php } ?>
      </div>

      <?php if($link_term){ ?>
         <a class="link-term-overlay" href="<?php echo esc_url($link_term); ?>" <?php echo $target ?>></a>
      <?php } ?>
               
   </div>
</div>