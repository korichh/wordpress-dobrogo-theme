<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="page">
        <?php $my_lang = pll_current_language(); ?>
        <?php if ($my_lang == 'en') : ?>
            <?php $contacts_link = get_permalink(94); ?>
            <?php $oblig_link = get_permalink(98); ?>
        <?php else : ?>
            <?php $contacts_link = get_permalink(21); ?>
            <?php $oblig_link = get_permalink(35); ?>
        <?php endif; ?>
        <div class="popup">
            <div class="popup-wrapper">
                <div class="popup-inner">
                    <div class="popup-inner__donate popup-donate popup-elem">
                        <div class="popup-donate__inner">
                            <header class="popup-donate__header">
                                <h3 class="popup-donate__title">
                                    <span><?php esc_html_e('Задонатити на', 'dobrogo') ?> </span> <span class="title"></span>
                                </h3>
                            </header>
                            <div class="popup-donate__body">
                                <div class="popup-donate__accordion accordion">
                                    <button class="accordion-button">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/liqpay.svg" alt="liqpay">
                                    </button>
                                    <div class="accordion-body">
                                        <div class="accordion-body__inner">
                                            <form action="<?= CFS()->get('donate_liqpay', 13); ?>">
                                                <div class="accordion-body__icons">
                                                    <div class="accordion-body__icon">
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/privat.svg" alt="privat">
                                                    </div>
                                                    <div class="accordion-body__icon">
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/google.svg" alt="google">
                                                    </div>
                                                    <div class="accordion-body__icon">
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/master.svg" alt="master">
                                                    </div>
                                                    <div class="accordion-body__icon">
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/visa.svg" alt="visa">
                                                    </div>
                                                </div>
                                                <div class="accordion-body__row">
                                                    <input type="checkbox" required class="accordion-body__checkbox" id="liqpay_check">
                                                    <label for="liqpay_check" class="accordion-body__label">
                                                        <?php esc_html_e('Я ознайомився з', 'dobrogo') ?> <a href="<?= $oblig_link; ?>"><?php esc_html_e("обов'язками", 'dobrogo') ?></a>
                                                    </label>
                                                </div>
                                                <input class="accordion-body__submit" type="submit" value="<?php esc_html_e('Задонатити', 'dobrogo') ?>">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="popup-donate__accordion accordion">
                                    <button class="accordion-button">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/monologo.svg" alt="mono">
                                    </button>
                                    <div class="accordion-body">
                                        <div class="accordion-body__inner">
                                            <form action="<?= CFS()->get('donate_mono', 13); ?>">
                                                <div class="accordion-body__icons">
                                                    <div class="accordion-body__icon black">
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/mono.svg" alt="mono">
                                                    </div>
                                                    <div class="accordion-body__icon">
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/google.svg" alt="google">
                                                    </div>
                                                </div>
                                                <div class="accordion-body__row">
                                                    <input type="checkbox" required class="accordion-body__checkbox" id="mono_check">
                                                    <label for="mono_check" class="accordion-body__label">
                                                        <?php esc_html_e('Я ознайомився з', 'dobrogo') ?> <a href="<?= $oblig_link; ?>"><?php esc_html_e("обов'язками", 'dobrogo') ?></a>
                                                    </label>
                                                </div>
                                                <input class="accordion-body__submit" type="submit" value="<?php esc_html_e('Задонатити', 'dobrogo') ?>">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <header class="header">
                <style>
                    #wpadminbar {
                        position: absolute !important;
                    }

                    html {
                        margin: 0 !important;
                    }
                </style>
                <div class="header-wrapper">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="header-inner">
                            <?php if (get_theme_mod('custom_logo')) : ?>
                                <div class="header-inner__logo">
                                    <a href="<?php echo home_url('/'); ?>">
                                        <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>" alt="dobrogo logo">
                                    </a>
                                </div>
                            <?php endif; ?>
                            <ul class="menu languages small">
                                <?php
                                $args = array('show_flags' => 1, 'show_names' => 0, 'hide_current' => false, 'dropdown' => 0, 'display_names_as' => 'slug');
                                pll_the_languages($args);
                                ?>
                            </ul>
                            <nav class="header-inner__nav header-nav">
                                <?php if (get_theme_mod('custom_logo')) : ?>
                                    <div class="header-nav__logo">
                                        <a href="<?php echo home_url('/'); ?>">
                                            <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>" alt="dobrogo logo">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'header-menu',
                                    'menu_id'        => 'primary-menu',
                                    'container' => null
                                ));
                                ?>
                                <ul class="menu languages big">
                                    <?php
                                    $args = array('show_flags' => 1, 'show_names' => 0, 'hide_current' => false, 'dropdown' => 0, 'display_names_as' => 'slug');
                                    pll_the_languages($args);
                                    ?>
                                </ul>
                                <div class="header-nav__button">
                                    <a href="<?= $contacts_link; ?>">
                                        <?php esc_html_e("Зв'язатися", 'dobrogo') ?>
                                    </a>
                                </div>
                            </nav>
                            <div class="header-inner__burger header-burger">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>