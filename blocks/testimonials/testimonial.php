<?php
/**
 * Testimonial Block Template.
 */

// Support custom "anchor" values.
$id = 'testimonial' . $block['id'];

if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonial';
if ( ! empty( $block['class_name'] ) ) {
    $class_name .= ' ' . $block['class_name'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$section_title                = get_field('section_title') ?: 'Add a title here';
$section_heading              = get_field('section_heading');
$clients_testimonials         = get_field('clients_testimonials');

//Testimonial sub field
$client_message               = get_sub_field('message') ?: "Message from the client";
$client_image                 = get_sub_field('client_image') ?: 295;
$client_name                  = get_sub_field('client_name') ?: "Name of the client";

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
     <div class="testimonial__container">
          <div class="container-heading-row">
               <div class="headings">
                    <?php if( !empty( $section_title ) ){?>
                         <p class="title"><?php echo esc_attr( $section_title ); ?></p>
                    <?php } ?>

                    <?php if( !empty( $section_heading ) ){?>
                         <h2><?php echo esc_attr( $section_heading ); ?></h2>
                    <?php } ?>
               </div>

               <div class="arrowbox">
                    <div class="swiper-button-prev-test">
                         <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                         <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                         </svg>
                    </div>
                    <div class="swiper-button-next-test">
                         <div class="arrow-right">
                              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                              <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                              </svg>
                         </div>

                    </div>
               </div>
          </div>
          
          <div class="testimonial__container--wrapper swiper-container swiper-testimonial">
               <div class="testimonial-lists swiper-wrapper">
                    <?php if( have_rows('clients_testimonials') ): ?>
          
                         <?php while (have_rows('clients_testimonials')): the_row(); 
                         //Variable to get the project image
                         $image = get_sub_field('client_image');
                         $picture = $image['sizes']['medium']; //Fetch the image's large size
                         ?>
                         <div class="single-testimony swiper-slide">
                              <h3><?php the_sub_field( 'heading' ); ?></h3>
                              <p><?php the_sub_field( 'message' ); ?></p>
                              <div class="client-data">
                                   <img src="<?php echo $picture; ?>" alt="<?php echo $image['alt']; ?>" />
                                   <p><?php the_sub_field(  'client_name'  ); ?></p>
                              </div>
                         </div>
                         <?php endwhile; ?>
                    <?php endif; ?>

                    
               </div>
               <!-- Add Pagination -->
               <div class="swiper-pagination"></div>
          </div>
     </div>
</section>