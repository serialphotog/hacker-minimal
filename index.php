<?php get_header(); ?>

    <div class="row">
        <div class="column column-80" id="content-area">
            <?php 
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        
                        get_template_part('parts/content-excerpt'); 
                    }
                }
            ?>
        </div>
        <div class="column" id="sidebar-area">
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>
