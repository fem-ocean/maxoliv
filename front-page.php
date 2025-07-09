<?php
/**
 * Front Page Template - Single Page Application Layout
 * 
 * @package Maxoliv
 */
if (!defined('ABSPATH')) {
    exit; // Security check
}

get_header(); // Load header.php
?>


<!-- main container -->
<div class="flex h-full overflow-hidden border-2 border-black flex-row">

    <!-- check if the user is on a mobile device -->
    <?php if (wp_is_mobile()) : ?>
            <!-- Mobile Content -->

        <main class="h-screen overflow-y-auto z-10 scroll-smooth overflow-x-hidden relative">

            <!-- Left Panel (Navigation) -->
            <?php get_template_part('template-parts/left-panel'); ?>

            <div class="sticky w-screen" 
                style="background-image: url('<?php echo esc_url(get_theme_mod('right_panel_bg', get_template_directory_uri() . '/assets/images/mypics.png')); ?>')">
                <div class="w-full h-full absolute bg-transparentoverlay" style="background-color: var(--theme-transparent-overlay)"></div>
                <!-- will come back to this for themes background color -->
            </div>
            <?php get_template_part('template-parts/sections/about'); ?>
            <?php get_template_part('template-parts/sections/certifications'); ?>
            <?php get_template_part('template-parts/sections/testimonials'); ?>
            <?php get_template_part('template-parts/sections/projects'); ?>
            <?php get_template_part('template-parts/sections/contact'); ?>
        </main>

        <?php else : ?>
        <!-- Desktop Content -->
        
        <!-- Left Panel (Navigation) -->
        <?php get_template_part('template-parts/left-panel'); ?>


        <!-- Right Panel (Main Content) -->
        <div class="w-1/2 h-full relative overflow-hidden flex flex-col" id="right-panel">
            
            <!-- Background Layer -->
            <div class="fixed top-0 right-0 w-1/2 h-screen bg-cover bg-center -z-10" 
                style="background-image: url('<?php echo esc_url(get_theme_mod('right_panel_bg', get_template_directory_uri() . '/assets/images/mypics.png')); ?>')">
                <div class="absolute w-full h-full" style="background-color: var(--theme-transparent-overlay, <?php echo esc_attr(get_theme_mod('overlay_color', 'rgba(253,142,142,0.3)')); ?>)"></div>
                <!-- will come back to this for themes background color -->
            </div>

            <!-- Scrollable Sections -->
            <main class="h-screen overflow-y-auto scroll-smooth z-10 overflow-x-hidden relative">
                <div class="h-screen w-full bg-transparent sticky top-0"></div>
                <?php
                // Dynamically load sections
                $sections = ['about', 'certifications','testimonials', 'projects', 'contact'];
                foreach ($sections as $section) {
                    get_template_part("template-parts/sections/{$section}");
                }
                ?>
                
            </main>
        </div>
    <?php endif; ?>
<?php get_footer(); // Load footer.php ?>