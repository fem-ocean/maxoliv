
<?php
get_header(); // Loads header.php
?>

<main class="main-body-container" id="scrollable-sections">
    <?php 
    // Load left panel
    get_template_part('template-parts/left-panel'); 
    
    // Conditional right panel/mobile
    if (wp_is_mobile()) {
        get_template_part('template-parts/mobile-content');
    } else {
        get_template_part('template-parts/right-panel');
    }
    ?>
</main>

<?php
get_footer(); // Loads footer.php
?>