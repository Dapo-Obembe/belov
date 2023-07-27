<?php
/**
 * Newsletter Block Template.
 */

// Support custom "anchor" values.
$id = 'newsletter' . $block['id'];

if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'newsletter';
if ( ! empty( $block['class_name'] ) ) {
    $class_name .= ' ' . $block['class_name'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values from ACF.
$heading                 = get_field('heading') ?: 'Add the section heading here';
$description             = get_field('description') ?: "Add your form secription";
$spam_notice             = get_field('spam_notice') ?: "Add SPAM notice here";

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
     <div class="newsletter__container">
          <div class="newsletter__container--row">
               <div class="heading">
                    <?php if( !empty( $heading ) ){?>
                         <h2><?php echo esc_attr( $heading ); ?></h2>
                    <?php } ?>

                    <?php if( !empty( $description ) ){?>
                         <p><?php echo ( $description ); ?></p>
                    <?php } ?>
               </div>
          
          <!--In REAL WEBSITE, This section will be adjusted to accomodate form shortcode-->
               <div class="newsletter__form">
                    <form action="#" method="post"> 
                         <input type="email" name="email" id="email" placeholder="Seu e-mail" />
                         <button type="submit">Enviar</button>
                    </form>
                    <?php if( !empty( $spam_notice ) ){?>
                         <p class="title"><?php echo ( $spam_notice ); ?></p>
                    <?php } ?>
               </div>
          </div>
          
     </div>
</section>