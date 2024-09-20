<?php
/* Template Name: News Template */
?>

<?php get_header(); ?>

<div class="page-content">
    <main class="main">
        <section class="news">
            <div class="news-wrapper">
                <div class="news-inner container">
                    <h1 class="news-inner__title main-title">
                        <?= CFS()->get('news_title'); ?>
                    </h1>
                    <ul class="news-inner__list">
                        <?php
                        $paged = absint(
                            max(
                                1,
                                get_query_var('paged') ? get_query_var('paged') : get_query_var('page')
                            )
                        );
                        $news_query = new WP_Query([
                            'posts_per_page' => 20,
                            'post_type' => 'news',
                            'order' => 'DESC',
                            'paged' => $paged,
                        ]);

                        if ($news_query->have_posts()) :
                            while ($news_query->have_posts()) :
                                $news_query->the_post(); ?>
                                <li class="news-inner__item news-item">
                                    <div class="news-item__inner">
                                        <div class="news-item__image">
                                            <a href="<?= get_permalink(get_the_ID()); ?>" class="image-link ibg">
                                                <?= wp_get_attachment_image(CFS()->get('news_image', get_the_ID()), 'full'); ?>
                                            </a>
                                        </div>
                                        <div class="news-item__content">
                                            <h4 class="news-item__title">
                                                <a href="<?= get_permalink(get_the_ID()); ?>">
                                                    <?= CFS()->get('news_title', get_the_ID()); ?>
                                                </a>
                                            </h4>
                                            <div class="news-item__text">
                                                <?= wp_trim_words(CFS()->get('news_text', get_the_ID()), 12); ?>
                                            </div>
                                            <div class="news-item__date">
                                                <p><?php esc_html_e('Дата:', 'dobrogo') ?> <?= CFS()->get('news_data', get_the_ID()); ?></p>
                                            </div>
                                            <div class="news-item__button">
                                                <a href="<?= get_permalink(get_the_ID()); ?>">
                                                    <?php esc_html_e('Переглянути', 'dobrogo') ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </ul>
                    <div class="page-pagination news-pagination">
                        <?php dobrogo_paginate($news_query, $paged); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer();
