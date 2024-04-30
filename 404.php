<?php
/**
 * Template Name: 404
 */
get_header(); ?>

<main class="page404 p-0">
    <div class="flex-container">
        <div class="text-center">
            <h1>
                <span class="fade-in" id="digit1">4</span>
                <span class="fade-in" id="digit2">0</span>
                <span class="fade-in" id="digit3">4</span>
            </h1>
            <h3 class="fadeIn">صفحه ای یافت نشد</h3>
            <a href="<?php echo esc_url(home_url()); ?>" type="button" name="button">بازگشت به خانه</a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
