<?php
/**
 * Music Player Block Template.
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
$background_image             = get_field('background_image');
$banner_title                 = get_field('banner_heading');
$banner_description           = get_field('banner_description');
$banner_link                  = get_field('hero_cta_link');
$banner_cta_text              = get_field('cta_text');
$banner_slides                = get_field('banner_text_slides');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
     <div class="banner__container">
          <div class="banner__container--row1">
               <div class="left">
                    <?php if( !empty($banner_title ) ){?>
                         <h1><?php echo esc_attr( $banner_title  ); ?></h1>
                    <?php } ?>

                    <?php if( !empty($banner_description ) ){?>
                         <h2><?php echo esc_attr( $banner_description  ); ?></h2>
                    <?php } ?>
               </div>
               <div class="right">
                    <div class="banner--image">
                         <?php echo wp_get_attachment_image( $background_image, 'full' ); ?>
                    </div>
               </div>
          </div>
           <div class="banner__container--row2">
          </div>
     </div>
</section>
