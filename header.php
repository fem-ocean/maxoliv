<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?> <!-- Keep this - Tailwind will be enqueued via functions.php -->
    
    <!-- Loading animation markup -->
    <div class="loading-overlay">
        <div class="loading-line"></div>
    </div>
</head>
<body <?php body_class('antialiased'); ?>>