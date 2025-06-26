

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

<!-- Main Container -->
<div class="maxoliv-spa-container">
    
    <!-- Left Panel (Navigation) -->
    <?php get_template_part('template-parts/left-panel')?>

    <!-- Right Panel (Main Content) -->
    <div class="right-panel" id="right-panel">
        
        <!-- Background Layer -->
        <div class="right-panel-bg" 
             style="background-image: url('<?php echo esc_url(get_theme_mod('right_panel_bg', get_template_directory_uri() . '/assets/images/mypicsedited2.jpg')); ?>')">
            <div class="overlay" style="background-color: var(--theme-transparent-overlay, <?php echo esc_attr(get_theme_mod('overlay_color', 'rgba(253,142,142,0.3)')); ?>)"></div>
        </div>
        <!-- Scrollable Sections -->
        <main class="scrollable-sections">
            <div class="empty-div"></div>
            <?php
            // Dynamically load sections
            $sections = ['about', 'certifications','testimonials', 'projects', 'contact'];
            foreach ($sections as $section) {
                get_template_part("template-parts/sections/{$section}");
            }
            ?>
            
        </main>
    </div>
</div>

<?php get_footer(); // Load footer.php ?>