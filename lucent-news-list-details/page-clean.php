<?php
/**
 * Template Name: Clean Page (No Menu & Footer)
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        #content {
            padding-top: 0;
        }
        #wpadminbar {
            display: none;
        }
        html {
            margin-top: 0 !important;
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', 'page');
                endwhile;
                ?>
            </main>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html> 