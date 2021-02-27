<!doctype html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>> 
    <div class="container">

        <header class="row" id="header">
            <div class="column" id="branding">
                <a href="<?php bloginfo('url'); ?>">
                    <?php bloginfo('name'); ?>
                </a>
                <span id="hamburger">&#9776;</span>
            </div>
            <nav class="column" id="primary-nav">
                <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array(
                            'theme_location'    => 'primary',
                        ));
                    }
                ?>
            </nav>
        </header>
