

<?php
// Ultra-minimal fallback (save as index.php)
get_header(); 
if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif;
get_footer();