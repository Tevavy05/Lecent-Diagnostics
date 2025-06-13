<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-news'); ?>>
                <header class="single-news-header">
                    <?php the_title('<h1 class="single-news-title">', '</h1>'); ?>

                    <div class="single-news-meta">
                        <span class="posted-on">
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="posted-by">
                            <?php
                            printf(
                                esc_html__('by %s', 'lucent-news-list-details'),
                                '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
                            );
                            ?>
                        </span>
                        <?php
                        $categories_list = get_the_term_list(get_the_ID(), 'news_category', '', ', ');
                        if ($categories_list) :
                            printf('<span class="news-categories"> | %s</span>', $categories_list);
                        endif;
                        ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-news-featured-image">
                        <?php the_post_thumbnail('news-featured', array('class' => 'single-news-image')); ?>
                    </div>
                <?php endif; ?>

                <div class="single-news-content">
                    <?php
                    the_content(
                        sprintf(
                            wp_kses(
                                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'lucent-news-list-details'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post(get_the_title())
                        )
                    );

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'lucent-news-list-details'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="single-news-footer">
                    <?php
                    $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'lucent-news-list-details'));
                    if ($tags_list) {
                        printf('<div class="tags-links">%s</div>', $tags_list);
                    }
                    ?>

                    <nav class="navigation post-navigation">
                        <h2 class="screen-reader-text"><?php esc_html_e('Post navigation', 'lucent-news-list-details'); ?></h2>
                        <div class="nav-links">
                            <?php
                            previous_post_link('<div class="nav-previous">%link</div>', '%title');
                            next_post_link('<div class="nav-next">%link</div>', '%title');
                            ?>
                        </div>
                    </nav>
                </footer>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?> 