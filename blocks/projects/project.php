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
$go_to_project_page           = get_field('link_to_all_projects');
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
          <div class="all_projects">
               <a href="<?php echo $go_to_project_page; ?>">Nosso portfólio e estudos de caso <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
               <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
               </svg></a>
          </div>
     </div>
</section>

