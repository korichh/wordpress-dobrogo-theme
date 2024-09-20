<?php
/* Template Name: Orders Template */
?>

<?php get_header(); ?>

<div class="page-content">
    <main class="main">
        <section class="orders">
            <div class="orders-wrapper">
                <div class="orders-inner container">
                    <h1 class="orders-inner__title main-title">
                        <?= CFS()->get('news_title'); ?>
                    </h1>
                    <ul class="orders-inner__list">
                        <?php
                        $paged = absint(
                            max(
                                1,
                                get_query_var('paged') ? get_query_var('paged') : get_query_var('page')
                            )
                        );
                        $orders_query = new WP_Query([
                            'posts_per_page' => 20,
                            'post_type' => 'post',
                            'order' => 'DESC',
                            'paged' => $paged,
                        ]);

                        if ($orders_query->have_posts()) :
                            while ($orders_query->have_posts()) :
                                $orders_query->the_post(); ?>
                                <li class="orders-inner__item orders-item">
                                    <div class="orders-item__inner">
                                        <div class="orders-item__image">
                                            <a href="<?= get_permalink(get_the_ID()); ?>" class="image-link ibg">
                                                <?= wp_get_attachment_image(CFS()->get('order_image', get_the_ID()), 'full'); ?>
                                            </a>
                                        </div>
                                        <div class="orders-item__content">
                                            <div class="orders-item__date">
                                                <p><?= get_the_date('Y-d-m'); ?></p>
                                            </div>
                                            <h2 class="orders-item__title">
                                                <a href="<?= get_permalink(get_the_ID()); ?>">
                                                    <?= $orders_query->current_post + 1 ?>) <span class="title"><?= CFS()->get('order_title', get_the_ID()); ?></span>
                                                </a>
                                            </h2>
                                            <div class="orders-item__date resp">
                                                <p><?php esc_html_e('Дата отримання заявки:', 'dobrogo') ?> <?= get_the_date('Y-d-m'); ?></p>
                                            </div>
                                            <div class="orders-item__block resp">
                                                <p><?php esc_html_e('Зібрано:', 'dobrogo') ?> <span class="already"><?= CFS()->get('order_already', get_the_ID()); ?></span> <?php esc_html_e('грн', 'dobrogo') ?></p>
                                                <p><?php esc_html_e('Ціль:', 'dobrogo') ?> <span class="aim"><?= CFS()->get('order_aim', get_the_ID()); ?></span> <?php esc_html_e('грн', 'dobrogo') ?></p>
                                            </div>
                                            <div class="orders-item__bar resp">
                                                <div class="progress"></div>
                                            </div>
                                            <div class="orders-item__image resp">
                                                <a href="<?= get_permalink(get_the_ID()); ?>" class="image-link ibg">
                                                    <?= wp_get_attachment_image(CFS()->get('order_image', get_the_ID()), 'full'); ?>
                                                </a>
                                            </div>
                                            <div class="orders-item__text">
                                                <?= dobrogo_trim(CFS()->get('order_text', get_the_ID()), 450, sprintf('<a class="more" href="%1$s">...</a>', get_permalink(get_the_ID())), '<a><p><b><strong><em><i>'); ?>
                                            </div>
                                            <div class="orders-item__block">
                                                <p><?php esc_html_e('Зібрано:', 'dobrogo') ?> <span class="already"><?= CFS()->get('order_already', get_the_ID()); ?></span> <?php esc_html_e('грн', 'dobrogo') ?></p>
                                                <p><?php esc_html_e('Залишилося:', 'dobrogo') ?> <span class="still"></span> <?php esc_html_e('грн', 'dobrogo') ?></p>
                                            </div>
                                            <div class="orders-item__bar">
                                                <div class="progress"></div>
                                            </div>
                                            <div class="orders-item__block">
                                                <p><?php esc_html_e('Ціль:', 'dobrogo') ?> <span class="aim"><?= CFS()->get('order_aim', get_the_ID()); ?></span> <?php esc_html_e('грн', 'dobrogo') ?></p>
                                                <div class="orders-item__buttons">
                                                    <div class="orders-item__button">
                                                        <a href="<?= get_permalink(get_the_ID()); ?>">
                                                            <?php esc_html_e('Докладніше', 'dobrogo') ?>
                                                        </a>
                                                    </div>
                                                    <div class="orders-item__button donate-button">
                                                        <a href="#">
                                                            <?php esc_html_e('Задонатити', 'dobrogo') ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </ul>
                    <div class="page-pagination news-pagination">
                        <?php dobrogo_paginate($orders_query, $paged); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer();
