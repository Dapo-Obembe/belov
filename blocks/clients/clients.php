<?php
/**
 * Client Block Template.
 */

// Support custom "anchor" values.
$id = 'clients' . $block['id'];

if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'clients';
if ( ! empty( $block['class_name'] ) ) {
    $class_name .= ' ' . $block['class_name'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values from ACF.
$section_title                = get_field('section_title') ?: 'Add a title here';
$section_heading              = get_field('section_heading') ?: 'Add the section heading here';
$clients                      = get_field('all_clients');



?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
     <div class="clients__container">
          <div class="clients__container--headings">
               <?php if( !empty( $section_title ) ){?>
                    <p class="title"><?php echo esc_attr( $section_title ); ?></p>
               <?php } ?>

               <?php if( !empty( $section_heading ) ){?>
                    <h2 class="project-heading"><?php echo esc_attr( $section_heading ); ?></h2>
               <?php } ?>
          </div>
          <div class="clients__box">
               <?php if( have_rows('all_clients') ): ?>
     
                    <?php while (have_rows('all_clients')): the_row(); 
                    
                         //Pull CLients' Logo
                         $client_logo   = get_sub_field('client_logo');
                         $logo          = $client_logo['sizes']['medium']; 
                    ?>

                    <div class="logo">
                         <img src="<?php echo $logo; ?>" alt="<?php echo $client_logo['alt']; ?>" />
                    </div>

                    <?php endwhile; ?>
               <?php endif; ?>
          </div>
     </div>
</section>