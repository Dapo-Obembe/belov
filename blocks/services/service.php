<?php
/**
 * Services Block Template.
 */

// Support custom "anchor" values.
$id = 'services' . $block['id'];

if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'services';
if ( ! empty( $block['class_name'] ) ) {
    $class_name .= ' ' . $block['class_name'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$service_image                = get_field('service_image') ?: 295;
$section_title                = get_field('section_title') ?: 'Add a title here';
$section_heading              = get_field('service_heading');
$section_description          = get_field('service_description');
$service_lists                = get_field('service_lists');


?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
     <div class="service__container">
          <div class="service__container--image">
               <div class="image">
                    <?php echo wp_get_attachment_image( $service_image, 'full'); ?>
               </div>
          </div>
          <div class="service__container--contents">
               <?php if( !empty( $section_title ) ){?>
                    <p class="title"><?php echo esc_attr( $section_title ); ?></p>
               <?php } ?>
               <h2 class="service-heading"></h2>
               <?php if( !empty( $section_heading ) ){?>
                    <h2 class="service-heading"><?php echo esc_attr( $section_heading ); ?></h2>
               <?php } ?>
               
               <?php if( !empty( $section_description ) ){?>
                    <p class="service-description"><?php echo $section_description; ?></p>
               <?php } ?>

               <div class="service-lists">
                    <div class="items">
                         <?php if( have_rows('service_lists') ): ?>
               
                              <?php while (have_rows('service_lists')): the_row(); ?>

                                   <div>
                                        <p><?php the_sub_field('service_name'); ?></p>
                                        <a href="<?php the_sub_field('service_link'); ?>">LINK</a>
                                   </div>

                              <?php endwhile; ?>
                         <?php endif; ?>
                    </div>
               </div>
          </div>
     </div>
</section>