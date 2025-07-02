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
    'dark'  => get_theme_mod('theme_switcher_dark_color', '#0A090C'),
    'pink' => get_theme_mod('theme_switcher_pink_color', '#fd8e8e'),
    'yellow'  => get_theme_mod('theme_switcher_yellow_color', '#fde58e'),
    'green'  => get_theme_mod('theme_switcher_green_color', '#8efdb0'),
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