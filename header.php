<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS via CDN (before wp_head()) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">

    <?php wp_head(); ?> <!-- THIS IS CRUCIAL FOR ENQUEUED FILES -->

   
    <div class="loading-overlay">
        <div class="loading-line"></div>
    </div>

     <!-- Loading animation (better as absolute positioned) -->
    <!-- <div class="fixed inset-0 z-50 flex items-center justify-center bg-white/90">
        <div class="w-64 h-1 bg-gray-200 rounded-full overflow-hidden">
            <div class="h-full bg-blue-600 animate-loading-line"></div>
        </div>
    </div> -->
   

</head>
<body <?php body_class(); ?>>