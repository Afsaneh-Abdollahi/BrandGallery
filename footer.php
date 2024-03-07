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

        </div>

    </div>
    <div class="copyright">
        <div class="container-fluid">
            <p>تمام حقوق مادی و معنوی این وب سایت متعلق به برند گالری می باشد.</p>
            <ul class="footer-social">
                <?php while (have_rows('social_media_repeater', 'option')) : the_row(); ?>
                    <li><a href="<?php echo get_sub_field('link') ?>"><i
                                    class="fab <?php echo get_sub_field('icon') ?>"></i></a></li>
                <?php endwhile;
                wp_reset_query(); ?>
            </ul>
        </div>
    </div>
</footer>

<!-- /footer -->

<?php wp_footer(); ?>
</body>
</html>
