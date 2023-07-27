<?php
/**
 * Manifesto Block Template.
 */

// Support custom "anchor" values.
$id = 'manifesto' . $block['id'];

if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'manifesto';
if ( ! empty( $block['class_name'] ) ) {
    $class_name .= ' ' . $block['class_name'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values from ACF.
$section_title                = get_field('section_title') ?: 'Add a title here';
$section_heading              = get_field('section_heading') ?: 'Add the section heading here';
$manifesto_image              = get_field('manifesto_image') ?: 295;
$manifestpo_description       = get_field('manifesto_description') ?: "Add description here";
$manifesto_link               = get_field('manifesto_link') ?: "Add link here";
$manifesto_team               = get_field('team');



?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
     <div class="manifesto__container">
          <div class="manifesto__container--headings">
               <?php if( !empty( $section_title ) ){?>
                    <p class="title"><?php echo esc_attr( $section_title ); ?></p>
               <?php } ?>

               <?php if( !empty( $section_heading ) ){?>
                    <h2 class="project-heading"><?php echo esc_attr( $section_heading ); ?></h2>
               <?php } ?>
          </div>
          <div class="manifesto__contents">
               <div class="image">
                    <?php echo wp_get_attachment_image( $manifesto_image, 'full', 'alt'); ?>
               </div>
               <div class="description-box">
                    <?php if( !empty( $manifestpo_description ) ){?>
                         <p class="description"><?php echo $manifestpo_description; ?>
                         </p>
                    <?php } ?>
                    <?php if( !empty( $manifesto_link ) ){?>
                         <a href="<?php echo $manifesto_link; ?>">Saiba mais</a>
                    <?php } ?>

                    <div class="team-box">
                         <?php if( have_rows('team') ): ?>
          
                         <?php while (have_rows('team')): the_row(); 
                         
                         //Pull team image
                         $team_image = get_sub_field('team_image');
                         $image = $team_image['sizes']['large']; 

                         ?>

                              <p><?php the_sub_field('title'); ?></p>
                              <img src="<?php echo $image; ?>" alt="<?php echo $team_image['alt']; ?>" />

                         <?php endwhile; ?>
                         <?php endif; ?>
                    </div>
               </div>
          </div>
     </div>
</section>