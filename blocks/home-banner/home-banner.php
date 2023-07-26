<?php
/**
 * Home Page Banner Block Template.
 */

// Support custom "anchor" values.
$id = 'banner' . $block['id'];

if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'banner';
if ( ! empty( $block['class_name'] ) ) {
    $class_name .= ' ' . $block['class_name'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$background_image             = get_field('background_image') ?: 268;
$banner_title                 = get_field('banner_heading') ?: 'Add a title here';
$banner_description           = get_field('banner_description');
$banner_button_link           = get_field('hero_button_link');
$button_link_text             = get_field('button_text');
$banner_cta_text              = get_field('cta_text');
$banner_slides                = get_field('banner_text_slides');
$background_color = get_field( 'background_color' ); //Let user change to background that matches the background image

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>" style="background-image: url(<?php echo the_field('background_image'); ?>); background-color: <?php the_field('background_color'); ?>">  
     <div class="banner__container">
          <div class="banner__container--row1">
               <div class="banner--content">
                    <?php if( !empty($banner_title ) ){?>
                         <h1><?php echo esc_attr( $banner_title  ); ?></h1>
                    <?php } ?>

                    <?php if( !empty($banner_description ) ){?>
                         <h2><?php echo esc_attr( $banner_description  ); ?></h2>
                    <?php } ?>
                    <div class="banner--cta">
                         <?php if( !empty( $banner_button_link ) ){?>
                              <button class="banner-button"><a href="<?php echo esc_attr( $banner_button_link ); ?>" ><?php echo esc_attr( $button_link_text ); ?></a></button>
                              <p><?php echo esc_attr( $banner_cta_text ); ?></p>
                         <?php } ?>
                    </div>
               </div>
          </div>
     </div>
</section>

<div class="service-list">
     <div class="sliding-texts">
          <?php if( have_rows('banner_text_slides') ): ?>
               
               <?php while (have_rows('banner_text_slides')): the_row(); ?>

                    <p><?php the_sub_field('item'); ?></p>

               <?php endwhile; ?>
          <?php endif; ?>
     </div>
</div>
