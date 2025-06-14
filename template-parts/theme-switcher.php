<?php
/**
 * Theme Switcher Template
 *
 * @package Maxoliv
 */
if (!defined('ABSPATH')) {
    exit; // Security check
}

// Get theme colors from Customizer with defaults
$theme_colors = array(
    'light' => get_theme_mod('theme_switcher_light_color', '#fd8e8e'),
    'dark'  => get_theme_mod('theme_switcher_dark_color', '#fde58e'),
    'blue'  => get_theme_mod('theme_switcher_blue_color', '#8efdb0')
);
?>

<div class="theme-switcher">
    <?php foreach ($theme_colors as $theme => $color) : ?>
        <button class="theme-dot" 
                data-theme="<?php echo esc_attr($theme); ?>" 
                style="background-color: <?php echo esc_attr($color); ?>"
                aria-label="<?php printf(esc_attr__('Switch to %s theme', 'maxoliv'), $theme); ?>">
        </button>
    <?php endforeach; ?>
</div>