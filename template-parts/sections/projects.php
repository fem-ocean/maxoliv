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




<div class="flex relative justify-center items-center gap-[10px] my-[20px] px-[55px] w-full h-full max-w-[530px] mx-auto">
  <div class="min-w-[300px] h-[95%] w-full rounded-[10px] shadow-[0_4px_20px_rgba(0,0,0,0.1)] transition-all duration-500 [transition-timing-function:cubic-bezier(0.68,-0.6,0.32,1.6)]">
    <div class="absolute top-0 left-0 w-full h-full z-10 p-[20px] text-white flex flex-col justify-center">
      <h3 class="text-[1.3rem] mb-[10px]">Project</h3>
      <div class="flex flex-wrap gap-[8px] my-[15px]">
        <span class="bg-white/20 px-[10px] py-[4px] rounded-full text-[0.6rem]">Tech</span>
      </div>
      <a href="#" class="inline-block px-[16px] py-[8px] bg-white text-[#0cdcf7] font-bold rounded-full text-center transition-all duration-300 ease hover:bg-white/90 hover:-translate-y-[2px]">
        View
      </a>
    </div>
  </div>
</div>