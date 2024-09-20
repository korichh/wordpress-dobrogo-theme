<footer class="footer">
    <?php $my_lang = pll_current_language(); ?>
    <div class="footer-wrapper">
        <div class="footer-inner">
            <div class="footer-inner__contact footer-contact container">
                <div class="footer-contact__inner">
                    <h2 class="footer-inner__title">
                        <?php if ($my_lang == 'en') : ?>
                            <?= CFS()->get('footer_title', 87); ?>
                        <?php else : ?>
                            <?= CFS()->get('footer_title', 13); ?>
                        <?php endif; ?>
                    </h2>
                    <div class="footer-inner__button">
                        <?php if ($my_lang == 'en') : ?>
                            <?php $contacts_link = get_permalink(94); ?>
                            <?php $charge_link = get_permalink(98); ?>
                        <?php else : ?>
                            <?php $contacts_link = get_permalink(21); ?>
                            <?php $charge_link = get_permalink(35); ?>
                        <?php endif; ?>
                        <a href="<?= $contacts_link ?>">
                            <?php esc_html_e("Зв'язатися з нами!", 'dobrogo') ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-inner__bottom">
                <div class="footer-inner__columns container">
                    <div class="footer-inner__block">
                        <div class="footer-inner__column">
                            <?php if (get_theme_mod('custom_logo')) : ?>
                                <div class="footer-inner__logo">
                                    <a href="<?php echo home_url('/'); ?>">
                                        <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>" alt="dobrogo logo">
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="footer-inner__copy">
                                <?php if ($my_lang == 'en') : ?>
                                    <?= CFS()->get('footer_copy', 87); ?>
                                <?php else : ?>
                                    <?= CFS()->get('footer_copy', 13); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="footer-inner__column">
                            <a href="<?= $charge_link ?>">
                                <?php esc_html_e("Обов'язки щодо перерахованих сум", 'dobrogo') ?>
                            </a>
                            <a href="<?= $contacts_link ?>">
                                <?php esc_html_e('Контакти', 'dobrogo') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<?php wp_footer(); ?>
</body>

</html>