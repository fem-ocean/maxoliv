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

<div class="theme-switcher flex items-center gap-4 mt-auto">
    <?php foreach ($theme_colors as $theme => $color) : ?>
        <button class="theme-dot w-4 h-4 rounded-[50%] border-none cursor-pointer opacity-95 transition-colors duration-700 p-0 appearance-none hover:scale-[(1.2)] focus:outline-2 focus:outline-[var(--theme-currentColor)] focus:outline-offset-2"
                data-theme="<?php echo esc_attr($theme); ?>" 
                style="background-color: <?php echo esc_attr($color); ?>"
                aria-label="<?php printf(esc_attr__('Switch to %s theme', 'maxoliv'), $theme); ?>">
        </button>
    <?php endforeach; ?>
</div>