<div class="right-panel">
    <?php get_template_part('template-parts/sections/about'); ?>
    <?php get_template_part('template-parts/sections/certifications'); ?>
    <!-- Other desktop sections -->
    <?php if (!empty($children)) : ?>
        <div class="panel-children"><?php echo $children; ?></div>
    <?php endif; ?>
</div>


<?php
/**
 * Right Panel Template
 */
?>
<div class="right-panel-container" id="right-panel">
    
    <!-- Background Layer -->
    <div class="background-layer" style="background: url('<?php echo esc_url(get_theme_mod('background_image')); ?>') no-repeat center center/cover;"></div>
    
    <!-- Scrollable Content -->
    <div class="scrollable-content" id="scrollable-sections">
        <div class="empty-div"></div>
        
        <!-- About Section -->
        <div class="section-wrapper" id="about-section">
            <div class="section-container">
                <div class="sticky-content">
                    <?php get_template_part('template-parts/sections/about'); ?>
                </div>
            </div>
        </div>
        
        <!-- Certifications Section -->
        <div class="section-wrapper" id="certifications-section">
            <div class="section-container">
                <div class="sticky-content">
                    <?php get_template_part('template-parts/sections/certifications'); ?>
                </div>
            </div>
        </div>
        
        <!-- Projects Section -->
        <div class="section-wrapper" id="projects-section">
            <div class="section-container">
                <div class="sticky-content">
                    <?php get_template_part('template-parts/sections/projects'); ?>
                </div>
            </div>
        </div>
        
        <!-- Contact Section -->
        <div class="section-wrapper">
            <?php get_template_part('template-parts/sections/contact'); ?>
        </div>
    </div>
</div>