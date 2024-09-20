<?php
/* Template Name: Charge Template */
?>

<?php get_header(); ?>
<div class="page-content">
    <main class="main">
        <section class="charge">
            <div class="charge-wrapper">
                <div class="charge-inner container">
                    <h2 class="charge-inner__title main-title">
                        <?= CFS()->get('charge_title'); ?>
                    </h2>
                    <div class="charge-inner__list">
                        <?= CFS()->get('charge_list'); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>