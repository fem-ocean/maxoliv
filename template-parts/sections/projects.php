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

<section id="projects-section" class="project-carousel" >
    <div class="project-section-intro">
        <h1>My Projects</h1>
        <p>Here are some of my works...</p>
    </div>
    
    <div class="projects-carousel-container">
        <button class="project-carousel-nav project-carousel-prev" aria-label="Previous">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m12 19-7-7 7-7"/>
                <path d="M19 12H5"/>
            </svg>
        </button>

        <?php if ($projects->have_posts()) : ?>
            <?php $i = 0; while ($projects->have_posts()) : $projects->the_post(); ?>
                <div class="project-card" style="background-color: <?php echo esc_attr($colors[$i % count($colors)]); ?>;">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" class="project-card-image">
                    <?php endif; ?>
                    
                    <div class="project-card-content">
                        <h3><?php the_title(); ?></h3>
                        <div class="project-description">
                            <?php the_excerpt(); ?>
                        </div>

                        <?php 
                        $technologies = get_field('project_technologies');
                        if ($technologies) :
                            $tech_list = explode(',', $technologies);
                        ?>
                            <div class="project-tech">
                                <?php foreach ($tech_list as $tech) : ?>
                                    <span><?php echo esc_html(trim($tech)); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        
                        <?php $project_link = get_field('project_link'); ?>
                        <?php if ($project_link) : ?>
                            <a href="<?php echo esc_url($project_link); ?>" target="_blank" class="project-link" style="color: <?php echo esc_attr($colors[$i % count($colors)]); ?>;">
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


        <button class="project-carousel-nav project-carousel-next" aria-label="Next">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"/>
                <path d="m12 5 7 7-7 7"/>
            </svg>
        </button>
    </div>


</section>