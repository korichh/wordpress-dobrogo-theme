<?php
/* Template Name: Reports Template */
?>

<?php get_header(); ?>
<div class="page-content">
    <main class="main">
        <section class="reports">
            <div class="reports-wrapper">
                <div class="reports-inner container">
                    <?php $my_lang = pll_current_language(); ?>
                    <h1 class="reports-inner__title main-title">
                        <?= CFS()->get('reports_title'); ?>
                    </h1>
                    <div class="reports-inner__tabs reports-tabs">
                        <nav class="reports-tabs__nav reports-nav">
                            <ul class="reports-nav__list">
                                <li class="reports-nav__item _active">
                                    <a href="#spending">
                                        <?php esc_html_e('Витрати', 'dobrogo') ?>
                                    </a>
                                </li>
                                <li class="reports-nav__item">
                                    <a href="#earning">
                                        <?php esc_html_e('Надходження', 'dobrogo') ?>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="reports-tabs__body reports-body">
                            <ul class="reports-body__list">
                                <li id="spending" class="reports-body__item _active">
                                    <div class="reports-body__content reports-content">
                                        <ul class="reports-content__list">
                                            <li class="reports-content__item">
                                                <div class="reports-content__date">
                                                    <?php esc_html_e('Дата купівлі', 'dobrogo') ?>
                                                </div>
                                                <div class="reports-content__product">
                                                    <?php esc_html_e('Товар', 'dobrogo') ?>
                                                </div>
                                                <div class="reports-content__count">
                                                    <?php esc_html_e('Кількість', 'dobrogo') ?>
                                                </div>
                                                <div class="reports-content__price">
                                                    <?php esc_html_e('Ціна грн', 'dobrogo') ?>
                                                </div>
                                                <div class="reports-content__category">
                                                    <?php esc_html_e('Категорія', 'dobrogo') ?>
                                                </div>
                                            </li>
                                            <?php
                                            if ($my_lang == 'en') :
                                                $spending_list = CFS()->get('spending_list', 111);
                                            else :
                                                $spending_list = CFS()->get('spending_list', 113);
                                            endif;
                                            ?>
                                            <?php if ($spending_list) : ?>
												<?php foreach ($spending_list as $item) : ?>
                                                    <li class="reports-content__item">
                                                        <div class="reports-content__date">
                                                            <?= $item['spending_date'] ?>
                                                        </div>
                                                        <div class="reports-content__product">
															<?php if($item['spending_product'][0] != "") : ?>
																<?php $product_id = $item['spending_product'][0]; ?>
																<a href="<?= get_permalink($product_id) ?>">
																	<?= CFS()->get('order_title', $product_id); ?>
																</a>
															<?php else : ?>
																<?= $item['spending_product_name'] ?>
															<?php endif; ?>
                                                        </div>
                                                        <div class="reports-content__count">
                                                            <?= $item['spending_count'] ?>
                                                        </div>
                                                        <div class="reports-content__price">
                                                            <?= $item['spending_price'] ?>
                                                        </div>
                                                        <div class="reports-content__category">
                                                            <?= $item['spending_category'] ?>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </li>
                                <li id="earning" class="reports-body__item">
                                    <div class="reports-body__content reports-content">
                                        <ul class="reports-content__list">
                                            <li class="reports-content__item">
                                                <div class="reports-content__date">
                                                    <?php esc_html_e('Дата донату', 'dobrogo') ?>
                                                </div>
                                                <div class="reports-content__total">
                                                    <?php esc_html_e('Сума грн', 'dobrogo') ?>
                                                </div>
                                                <div class="reports-content__from">
                                                    <?php esc_html_e('Від кого', 'dobrogo') ?>
                                                </div>
                                                <div class="reports-content__report">
                                                    <?php esc_html_e('На яку заявку', 'dobrogo') ?>
                                                </div>
                                                <div class="reports-content__state">
                                                    <?php esc_html_e('Статус', 'dobrogo') ?>
                                                </div>
                                            </li>
                                            <?php
                                            if ($my_lang == 'en') :
                                                $earning_list = CFS()->get('earning_list', 107);
                                            else :
                                                $earning_list = CFS()->get('earning_list', 109);
                                            endif;
                                            ?>
                                            <?php if ($earning_list) : ?>
												<?php foreach ($earning_list as $item) : ?>
													<li class="reports-content__item">
                                                        <div class="reports-content__date">
                                                            <?= $item['earning_date'] ?>
                                                        </div>
                                                        <div class="reports-content__total">
                                                            <?= $item['earning_total'] ?>
                                                        </div>
                                                        <div class="reports-content__from">
                                                            <?= $item['earning_from'] ?>
                                                        </div>
                                                        <div class="reports-content__report">
															<?php if($item['earning_report'][0] != "") : ?>
																<?php $report_id = $item['earning_report'][0]; ?>
																<a href="<?= get_permalink($report_id) ?>">
																	<?= CFS()->get('order_title', $report_id); ?>
																</a>
															<?php else : ?>
																<?= $item['earning_report_name'] ?>
															<?php endif; ?>
                                                        </div>
                                                        <div class="reports-content__state">
                                                            <?= $item['earning_state'] ?>
                                                        </div>
                                                    </li>
												<?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>