<?php get_header(); ?>

<div class="page-content">
    <main id="primary" class="main">
        <section class="error-404 not-found error">
            <div class="error-wrapper">
                <div class="error-inner">
                    <header class="page-header">
                        <h1 class="page-title">
                            <?php esc_html_e('Oops! That page can&rsquo;t be found.', 'dobrogo'); ?>
                        </h1>
                    </header>

                    <div class="page-text">
                        <p>
                            <?php esc_html_e('It looks like nothing was found at this location.', 'dobrogo'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer();
