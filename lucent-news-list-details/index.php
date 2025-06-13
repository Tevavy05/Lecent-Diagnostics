<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php if (is_home() && !is_front_page()) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>
        <?php endif; ?>

        <?php if (have_posts()) : ?>
            <div class="news-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('news-item'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="news-thumbnail">
                                <?php the_post_thumbnail('news-thumbnail'); ?>
                            </a>
                        <?php endif; ?>

                        <div class="news-content">
                            <header class="entry-header">
                                <?php
                                if (is_singular()) :
                                    the_title('<h1 class="news-title">', '</h1>');
                                else :
                                    the_title('<h2 class="news-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                                endif;
                                ?>
                            </header>

                            <div class="news-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <div class="news-meta">
                                <span class="posted-on">
                                    <?php echo get_the_date(); ?>
                                </span>
                                <?php
                                $categories_list = get_the_term_list(get_the_ID(), 'news_category', '', ', ');
                                if ($categories_list) :
                                    printf('<span class="news-categories"> | %s</span>', $categories_list);
                                endif;
                                ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('Previous', 'lucent-news-list-details'),
                'next_text' => __('Next', 'lucent-news-list-details'),
            ));
            ?>

        <?php else : ?>
            <p><?php esc_html_e('No news found.', 'lucent-news-list-details'); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?> 