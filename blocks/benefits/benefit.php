<?php
/**
 * Benefits Block Template.
 */

// Support custom "anchor" values.
$id = 'benefits' . $block['id'];

if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'benefits';
if ( ! empty( $block['class_name'] ) ) {
    $class_name .= ' ' . $block['class_name'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values from ACF.
$section_title                = get_field('section_title') ?: 'Add a title here';
$section_heading              = get_field('section_heading') ?: 'Add the section heading here';
$button_link                  = get_field('section_button_link');



?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
     <div class="benefit__container">
          <div class="benefit__container--headings">
               <?php if( !empty( $section_title ) ){?>
                    <p class="title"><?php echo esc_attr( $section_title ); ?></p>
               <?php } ?>

               <?php if( !empty( $section_heading ) ){?>
                    <h2><?php echo esc_attr( $section_heading ); ?></h2>
               <?php } ?>

               <?php if( !empty( $button_link ) ){?>
                    <button type="button"><a href="<?php echo $button_link; ?>">Discutir projeto</a></button>
               <?php } ?>
          </div>
          <div class="benefit__contents">
               <div class="benefit-box">
                    <?php if(have_rows('all_benefits')):?>
                         
                         <?php while(have_rows('all_benefits')): the_row();?>
                         
                         <button class="benefit-header">
                              <?php the_sub_field('benefit_header');?>
                         </button>
                         
                         <div class="panel">
                              <p><?php the_sub_field('benefit_content');?></p>
                         </div>
                         
                         <?php endwhile;?>
                         
			     <?php endif;?>
               </div>
          </div>
     </div>
</section>