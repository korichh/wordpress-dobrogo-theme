<?php get_header(); ?>
<div class="page-content">
    <main class="main">
        <?php $my_lang = pll_current_language(); ?>
        <section class="single">
            <div class="single-wrapper">
                <div class="single-inner container">
                    <div class="single-inner__content single-content fees-item">
                        <?= get_the_post_navigation([
                            'prev_text' => '<svg width="33" height="53" viewBox="0 0 33 53" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M32.75 46.4194L12.8168 26.625L32.75 6.83065L26.6134 0.750031L0.5 26.625L26.6134 52.5L32.75 46.4194Z" fill="#000" /></svg>',
                            'next_text' => '<svg width="33" height="53" viewBox="0 0 33 53" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.250245 6.83062L20.1834 26.625L0.250242 46.4194L6.38688 52.5L32.5002 26.625L6.38689 0.749998L0.250245 6.83062Z" fill="#000" /></svg>'
                        ]) ?>
                        <h1 class="single-content__title">
                            <?= CFS()->get('news_title', get_the_ID()); ?>
                        </h1>
                        <div class="single-content__date">
                            <p><?php esc_html_e('Дата:', 'dobrogo') ?> <?= CFS()->get('news_data', get_the_ID()); ?></p>
                        </div>
                        <div class="single-content__row">
                            <div class="single-content__image ibg">
                                <?= wp_get_attachment_image(CFS()->get('news_image', get_the_ID()), 'full'); ?>
                            </div>
                            <div class="single-content__text">
                                <?= CFS()->get('news_text', get_the_ID()); ?>
                            </div>
                        </div>
                        <?php wp_reset_postdata() ?>
                        <div class="single-content__button">
                            <?php if ($my_lang == 'en') : ?>
                                <?php $orders_link = get_permalink(90); ?>
                            <?php else : ?>
                                <?php $orders_link = get_permalink(17); ?>
                            <?php endif; ?>
                            <a href="<?= $orders_link ?>">
                                <?php esc_html_e('Перейти до заявок', 'dobrogo') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>