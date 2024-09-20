<?php get_header(); ?>

<div class="page-content">
    <main id="primary" class="main">
        <?php $my_lang = pll_current_language(); ?>
        <section class="hero">
            <div class="hero-wrapper">
                <div class="hero-bg">
                    <div class="hero-bg__main ibg">
                        <?= wp_get_attachment_image(CFS()->get('hero_image'), 'full'); ?>
                    </div>
                </div>
                <div class="hero-inner container">
                    <div class="hero-inner__swiper hero-swiper">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                $post_query = new WP_Query([
                                    'posts_per_page' => 8,
                                    'post_type' => 'post',
                                    'order' => 'DESC',
                                ]);

                                if ($post_query->have_posts()) :
                                    while ($post_query->have_posts()) :
                                        $post_query->the_post(); ?>
                                        <div class="swiper-slide hero-slide">
                                            <div class="hero-slide__inner">
                                                <div class="hero-slide__content hero-content">
                                                    <h2 class="hero-content__title">
                                                        <?= CFS()->get('order_title', get_the_ID()); ?>
                                                    </h2>
                                                    <div class="hero-content__text">
                                                        <?= wp_trim_words(CFS()->get('order_text', get_the_ID()), 25); ?>
                                                    </div>
                                                    <div class="hero-content__buttons">
                                                        <div class="hero-content__button">
                                                            <a href="<?= get_permalink(get_the_ID()); ?>">
                                                                <?php esc_html_e('До заявки', 'dobrogo') ?>
                                                            </a>
                                                        </div>
                                                        <div class="hero-content__button">
                                                            <a href="<?= get_permalink(get_the_ID()); ?>">
                                                                <?php esc_html_e('Задонатити', 'dobrogo') ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="hero-slide__image">
                                                    <?= wp_get_attachment_image(CFS()->get('order_image', get_the_ID()), 'full'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif;
                                wp_reset_postdata(); ?>
                                <div class="swiper-slide hero-slide">
                                    <div class="hero-slide__inner">
                                        <div class="hero-slide__content hero-content">
                                            <h2 class="hero-content__title">
                                                Title
                                            </h2>
                                            <div class="hero-content__text">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem doloribus quia quaerat facere libero iure, nobis veniam aliquid corrupti recusandae animi obcaecati excepturi. Cum ratione consequatur ad. Quasi, corporis quis?
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, a? Eaque consectetur provident natus ullam hic veniam totam, eum fugit, nesciunt nam corporis architecto, alias ut ab consequatur officiis dolores!</p>
                                            </div>
                                            <div class="hero-content__buttons">
                                                <div class="hero-content__button">
                                                    <a href="#">
                                                        <?php esc_html_e('До заявки', 'dobrogo') ?>
                                                    </a>
                                                </div>
                                                <div class="hero-content__button">
                                                    <a href="#">
                                                        <?php esc_html_e('Задонатити', 'dobrogo') ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hero-slide__image">
                                            <img width="978" height="295" src="http://dobrogo/wp-content/uploads/2022/11/logo.png" class="attachment-full size-full" alt="" decoding="async" srcset="http://dobrogo/wp-content/uploads/2022/11/logo.png 978w, http://dobrogo/wp-content/uploads/2022/11/logo-300x90.png 300w, http://dobrogo/wp-content/uploads/2022/11/logo-768x232.png 768w" sizes="(max-width: 978px) 100vw, 978px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-prev">
                            <svg width="33" height="53" viewBox="0 0 33 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M32.75 46.4194L12.8168 26.625L32.75 6.83065L26.6134 0.750031L0.5 26.625L26.6134 52.5L32.75 46.4194Z" fill="white" />
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg width="33" height="53" viewBox="0 0 33 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.250245 6.83062L20.1834 26.625L0.250242 46.4194L6.38688 52.5L32.5002 26.625L6.38689 0.749998L0.250245 6.83062Z" fill="white" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about">
            <div class="about-wrapper">
                <div class="about-inner container">
                    <div class="about-inner__content about-content">
                        <h1 class="about-content__title">
                            <?= CFS()->get('about_title'); ?>
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/about/flag.png" alt="SABBATH">
                        </h1>
                        <div class="about-content__text-top">
                            <?= CFS()->get('about_top_text'); ?>
                        </div>
                        <div class="about-content__button">
                            <?php if ($my_lang == 'en') : ?>
                                <?php $orders_link = get_permalink(90); ?>
                            <?php else : ?>
                                <?php $orders_link = get_permalink(17); ?>
                            <?php endif; ?>
                            <a href="<?= $orders_link ?>">
                                <?php esc_html_e('Перейти до заявок', 'dobrogo') ?>
                            </a>
                        </div>
                        <div class="about-content__text-bottom">
                            <?= CFS()->get('about_bottom_text'); ?>
                        </div>
                        <?php $autors_list = CFS()->get('about_list'); ?>
                        <?php if (count($autors_list) > 0) : ?>
                            <ul class="about-content__list">
                                <?php for ($i = 0; $i < count($autors_list); $i++) : ?>
                                    <li class="about-content__item about-item">
                                        <div class="about-item__inner">
                                            <div class="about-item__image">
                                                <?= wp_get_attachment_image($autors_list[$i]['about_list_image'], 'full'); ?>
                                            </div>
                                            <div class="about-item__text">
                                                <p><?= $autors_list[$i]['about_list_text'] ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="trust">
            <div class="trust-wrapper">
                <div class="trust-inner container">
                    <h2 class="trust-inner__title main-title">
                        <?= CFS()->get('trust_title'); ?>
                    </h2>
                    <?php $trust_list = CFS()->get('trust_list'); ?>
                    <?php if (count($trust_list) > 0) : ?>
                        <ul class="trust-inner__list">
                            <?php for ($i = 0; $i < count($trust_list); $i++) : ?>
                                <li class="trust-inner__item trust-item">
                                    <div class="trust-item__inner">
                                        <div class="trust-item__image">
                                            <?= wp_get_attachment_image($trust_list[$i]['trust_list_image'], 'full'); ?>
                                        </div>
                                        <div class="trust-item__content">
                                            <h4 class="trust-item__title">
                                                <?= $trust_list[$i]['trust_list_title'] ?>
                                            </h4>
                                            <div class="trust-item__text">
                                                <p><?= $trust_list[$i]['trust_list_text'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <section class="news">
            <div class="news-wrapper">
                <div class="news-inner container">
                    <div class="news-inner__top">
                        <h2 class="news-inner__title main-title">
                            <?= CFS()->get('news_title'); ?>
                        </h2>
                        <div class="news-inner__link">
                            <a href="<?= CFS()->get('news_link')['url']; ?>" target="<?= CFS()->get('news_link')['target']; ?>">
                                <img src="<?= get_template_directory_uri(); ?>/assets/img/news/link.png" alt="SABBATH">
                                <p><?= CFS()->get('news_link')['text']; ?></p>
                            </a>
                        </div>
                    </div>
                    <div class="news-inner__swiper news-swiper">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                $news_query = new WP_Query([
                                    'posts_per_page' => 8,
                                    'post_type' => 'news',
                                    'order' => 'DESC',
                                ]);

                                if ($news_query->have_posts()) :
                                    while ($news_query->have_posts()) :
                                        $news_query->the_post(); ?>
                                        <div class="swiper-slide news-slide">
                                            <div class="news-slide__inner">
                                                <div class="news-slide__image ibg">
                                                    <?= wp_get_attachment_image(CFS()->get('news_image', get_the_ID()), 'full'); ?>
                                                </div>
                                                <div class="news-slide__content">
                                                    <h4 class="news-slide__title">
                                                        <?= CFS()->get('news_title', get_the_ID()); ?>
                                                    </h4>
                                                    <div class="news-slide__text">
                                                        <?= wp_trim_words(CFS()->get('news_text', get_the_ID()), 12); ?>
                                                    </div>
                                                    <div class="news-slide__date">
                                                        <p><?php esc_html_e('Дата:', 'dobrogo') ?> <?= CFS()->get('news_data', get_the_ID()); ?></p>
                                                    </div>
                                                    <div class="news-slide__button">
                                                        <?php if ($my_lang == 'en') : ?>
                                                            <?php $reports_link = get_permalink(92); ?>
                                                        <?php else : ?>
                                                            <?php $reports_link = get_permalink(19); ?>
                                                        <?php endif; ?>
                                                        <a href="<?= $reports_link; ?>">
                                                            <?php esc_html_e('Звіти', 'dobrogo') ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif;
                                wp_reset_postdata(); ?>
                            </div>

                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="team">
            <div class="team-wrapper">
                <div class="team-inner container">
                    <div class="team-inner__top">
                        <h2 class="team-inner__title main-title">
                            <?= CFS()->get('team_title'); ?>
                        </h2>
                        <div class="team-inner__text">
                            <p><?= CFS()->get('team_text'); ?></p>
                        </div>
                    </div>
                    <div class="team-inner__swiper team-swiper">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php $team_list = CFS()->get('team_list'); ?>
                                <?php if (count($team_list) > 0) : ?>
                                    <?php for ($i = 0; $i < count($team_list); $i++) : ?>
                                        <div class="swiper-slide team-slide">
                                            <div class="team-slide__inner">
                                                <div class="team-slide__image ibg">
                                                    <?= wp_get_attachment_image($team_list[$i]['team_list_image'], 'full'); ?>
                                                </div>
                                                <div class="team-slide__decor">
                                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/team/decor.png" alt="SABBATH">
                                                </div>
                                                <div class="team-slide__content">
                                                    <h4 class="team-slide__title">
                                                        <?= $team_list[$i]['team_list_title'] ?>
                                                    </h4>
                                                    <div class="team-slide__text">
                                                        <p><?= $team_list[$i]['team_list_text'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer();
