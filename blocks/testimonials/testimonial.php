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
          <div class="testimonial__container--headings">
               <?php if( !empty( $section_title ) ){?>
                    <p class="title"><?php echo esc_attr( $section_title ); ?></p>
               <?php } ?>

               <?php if( !empty( $section_heading ) ){?>
                    <h2><?php echo esc_attr( $section_heading ); ?></h2>
               <?php } ?>

               <div class="testimonial-lists">
                    
                    <?php if( have_rows('clients_testimonials') ): ?>
          
                         <?php while (have_rows('clients_testimonials')): the_row(); ?>

                              <div class="single-testimony">
                                   <h3><?php the_sub_field( 'heading' ); ?></h3>
                                   <p><?php the_sub_field( 'message' ); ?></p>
                                   <div class="client-data">
                                        <p><?php the_sub_field(  'client_name'  ); ?></p>
                                   </div>
                              </div>

                         <?php endwhile; ?>
                    <?php endif; ?>
                    
               </div>
          </div>
     </div>
</section>