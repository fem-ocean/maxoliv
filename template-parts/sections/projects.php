<?php
/**
 * Projects Section Template with Animated Carousel
 *
 * @package Maxoliv
 * @since 1.0.0
 */

 if (!defined('ABSPATH')) exit;

$projects = new WP_Query(array(
    'post_type' => 'project',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
));

// Get unique colors for each project
$colors = array('#2e0014', '#7b2cbf', '#0e1c36', '#002626', '#6369d1', '#30343f', '#a72608', '#231942', '#006e90', '#51291E', '#7E2E84', '#131515', '#403D39', '#0081A7', '#AA1155', '#0b3c49', '#343E3D', '#0075A2', '#1C3144', '#0A0908');
?>




<section class="sticky top-0 pt-20 pb-12 px-16 overflow-hidden bg-[#131217] h-screen flex flex-col justify-evenly text-white">
  <div>
    <h1>My Projects</h1>
    <P>Here are some of my works...</P>
  </div>

  
  <div class="projects-carousel-container flex relative justify-center items-center gap-[10px] my-[20px] mx-0 py-0 px-[55px] overflow-hidden w-full h-full max-w-[530px] self-center">
    <button class="project-carousel-prev absolute bg-[#ocdcf7] w-10 h-10 rounded-[50%] flex justify-center items-center z-10 border-none cursor-pointer transition-all left-[8px]" aria-label="Previous">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m12 19-7-7 7-7"/>
        <path d="M19 12H5"/>
      </svg>
    </button>

    <?php if ($projects->have_posts()) : ?>
        <?php $i = 0; while ($projects->have_posts()) : $projects->the_post(); ?>
            <div class="project-card relative min-w-[300px] h-[95%] w-full rounded-[10px] overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.1)] transition-transform flex-shrink-0 will-change-[transform,opacity]" style="background-color: <?php echo esc_attr($colors[$i % count($colors)]); ?>;">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover rounded-[8px,8px,0,0] flex-grow-[2]">
                <?php endif; ?>
                
                <div class="project-card-content p-[20px] text-white flex flex-col justify-center absolute top-0 left-0 w-full h-full z-10">
                    <h3 class="text-xl mb-3"><?php the_title(); ?></h3>
                    <div class="project-description">
                        <?php the_excerpt(); ?>
                    </div>

                    <?php 
                    $technologies = get_field('project_technologies');
                    if ($technologies) :
                        $tech_list = explode(',', $technologies);
                    ?>
                        <div class="flex flex-wrap gap-2 my-[15px] mx-0">
                            <?php foreach ($tech_list as $tech) : ?>
                                <span class="text-[0.6rem] rounded-[20px] py-[4px] px-[10px] bg-[rgba(255,255,255,0.2)]"><?php echo esc_html(trim($tech)); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    
                    <?php $project_link = get_field('project_link'); ?>
                    <?php if ($project_link) : ?>
                        <a href="<?php echo esc_url($project_link); ?>" target="_blank" class="project-link inline-block py-2 px-4 bg-white no-underline rounded-[20px] font-bold text-center transition-all hover:bg-[rgba(255,255,255,0.9)] -translate-y-[2px]" style="color: <?php echo esc_attr($colors[$i % count($colors)]); ?>;">
                            View Project
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php $i++; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>No projects found.</p>
    <?php endif; ?>


    <button class="project-carousel-next absolute bg-[#ocdcf7] w-10 h-10 rounded-[50%] flex justify-center items-center z-10 border-none cursor-pointer transition-all right-[8px]" aria-label="Next">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"/>
            <path d="m12 5 7 7-7 7"/>
        </svg>
    </button>
  </div>



</section>