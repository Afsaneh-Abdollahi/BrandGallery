<?php
/**
 * The template for displaying the footer
 */
?>

<!-- footer -->

<footer class="footer">
    <div class="container-fluid">

        <?php if (have_rows('services_repeater', 'option')): ?>
            <section>
                <div class="service-section">
                    <div class="row">
                        <?php while (have_rows('services_repeater', 'option')) : the_row(); ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-1 d-flex">
                                <img src="<?php echo get_sub_field('img'); ?>" alt="">
                                <div>
                                    <h4><?php echo get_sub_field('title') ?></h4>
                                    <span class="text-muted"><?php echo get_sub_field('description') ?></span>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_query(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <div class="main_footer">
            <div class="bottom_sec">
                <p>کلیه حقوق مادی و معنوی متعلق به موسسه روانشناسی باتاب هزاره فردا می‌باشد.</p>
                <div class="zemtrix">
                    <a href="https://zemtrix.com/" target="_blank">
                        <img src="<?php echo get_template_directory_uri() ?>/img/zemtrix.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- /footer -->

<?php wp_footer(); ?>
</body>
</html>
