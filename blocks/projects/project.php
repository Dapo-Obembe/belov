<?php
/**
 * Projects Block Template.
 */

// Support custom "anchor" values.
$id = 'project' . $block['id'];

if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'project';
if ( ! empty( $block['class_name'] ) ) {
    $class_name .= ' ' . $block['class_name'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values from ACF.
$section_title                = get_field('section_title') ?: 'Add a title here';
$section_heading              = get_field('section_heading') ?: 'Add the section heading here';

$projects                     = get_field('the_projects');

//Sub-fields of the $projects
$project_image                = get_sub_field('project_image') ?: 295;
$project_title                = get_sub_field('project_title');
$link                         = get_sub_field('link');
$project_category             = get_sub_field('project_category') ?: 'Choose a category';


?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
     <div class="project__container">
          <div class="project__container--title">
               <?php if( !empty( $section_title ) ){?>
                    <p class="title"><?php echo esc_attr( $section_title ); ?></p>
               <?php } ?>
               <?php if( !empty( $section_heading ) ){?>
                    <h2 class="project-heading"><?php echo esc_attr( $section_heading ); ?></h2>
               <?php } ?>
          </div>
          <div class="project__box">
                    <?php if( have_rows('the_projects') ): ?>
          
                         <?php while (have_rows('the_projects')): the_row(); 
                         
                         //Variable to get the project image
                         $image = get_sub_field('project_image');
                         $picture = $image['sizes']['large']; //Fetch the image's large size

                         $link = get_sub_field('link');

                         ?>
                         <div class="single-project">
                              <img src="<?php echo $picture; ?>" alt="<?php echo $image['alt']; ?>" />
                              <h3>
                                   <a href="<?php echo $link; ?>"><?php the_sub_field('project_title'); ?></a>
                              </h3>
                              <div class="project-categories">
                                   <?php
                                        $categories = get_sub_field('project_category');
                                   
                                        if( !empty($categories) ): ?>
                                             <ul class="category-lists">
                                                  <?php foreach( $categories as $cat ): ?>
                                                       <li class="single-catgory"><?php echo $cat; ?></li>
                                                  <?php endforeach; ?>
                                             </ul>
                                   <?php endif; ?>
                              </div>
                         </div>

                         <?php endwhile; ?>
                    <?php endif; ?>
          </div>
     </div>
</section>

