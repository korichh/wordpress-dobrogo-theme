<?php
/* Template Name: Contacts Template */
?>

<?php get_header(); ?>
<div class="page-content">
    <main class="main">
        <section class="contacts">
            <div class="contacts-wrapper">
                <div class="contacts-inner container">
                    <h1 class="contacts-inner__title main-title">
                        <?= CFS()->get('contacts_title'); ?>
                    </h1>
                    <div class="contacts-inner__text">
                        <p><?= CFS()->get('contacts_text'); ?></p>
                    </div>
                    <div class="contacts-inner__content contacts-content">
                        <div class="contacts-content__left">
                            <form method="post" action="#wpcf7-f182-o1" class="contacts-content__form contacts-form wpcf7-form init" data-status="init">
								<div style="display: none;">
									<input type="hidden" name="_wpcf7" value="182">
									<input type="hidden" name="_wpcf7_version" value="5.6.4">
									<input type="hidden" name="_wpcf7_locale" value="uk">
									<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f182-o1">
									<input type="hidden" name="_wpcf7_container_post" value="0">
									<input type="hidden" name="_wpcf7_posted_data_hash" value="">
								</div>
                                <h2 class="contacts-form__title">
                                    <?= CFS()->get('form_title'); ?>
                                </h2>
                                <div class="contacts-form__list">
                                    <?= CFS()->get('form_list'); ?>
                                </div>
                                <div class="contacts-form__input">
                                    <input required placeholder="<?= CFS()->get('form_name'); ?>" type="text" name="user-name" id="input-name" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required">
                                    <label for="input-name">
                                        <?= CFS()->get('form_name_label'); ?>
                                    </label>
                                </div>
                                <div class="contacts-form__input">
                                    <input minlength="6" required placeholder="<?= CFS()->get('form_feedback'); ?>" type="text" name="user-contact" id="input-contact" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required">
                                    <label for="input-contact">
                                        <?= CFS()->get('form_feedback_label'); ?>
                                    </label>
                                </div>
                                <div class="contacts-form__textarea">
                                    <textarea required placeholder="<?= CFS()->get('form_textarea'); ?>" name="user-message" id="input-message" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"></textarea>
                                </div>
                                <div class="contacts-form__submit">
                                    <input type="submit" value="<?= CFS()->get('form_submit'); ?>" class="wpcf7-submit">
                                </div>
                            </form>
                        </div>
                        <div class="contacts-content__right">
                            <div class="contacts-content__location contacts-location">
                                <div class="contacts-location__map">
                                    <?= CFS()->get('contacts_map'); ?>
                                </div>
                                <?php $contacts_list = CFS()->get('contacts_list'); ?>
                                <?php if (count($contacts_list) > 0) : ?>
                                    <ul class="contacts-location__list">
                                        <?php for ($i = 0; $i < count($contacts_list); $i++) : ?>
                                            <li class="contacts-location__item location-item">
                                                <div class="location-item__icon">
                                                    <?= wp_get_attachment_image($contacts_list[$i]['contacts_list_image'], 'full'); ?>
                                                </div>
                                                <div class="location-item__text">
                                                    <p><?= $contacts_list[$i]['contacts_list_text'] ?></p>
                                                </div>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>