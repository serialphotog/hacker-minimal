<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="post-header">
        <?php the_title(sprintf('<h2 class="post-title"><a href="%s">', 
            esc_url(get_permalink())), '</a></h2>'); ?>
    </header>

    <div class="post-content">
        <?php the_excerpt(); ?>
    </div>
</article>
