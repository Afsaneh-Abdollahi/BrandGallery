<?php
/**
 * Template Name: faq
 */
get_header(); ?>

<main class="pb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title mt-5">
                    <h3>سوالات متداول</h3>
                </div>
                <div class="accordion mt-2">
                    <?php if (have_rows('faq')): ?>
                        <?php while (have_rows('faq')): the_row(); ?>
                            <?php
                            $question = get_sub_field('question');
                            $answer = get_sub_field('answer');
                            ?>
                            <div class="accordion-item">
                                <div class="accordion-item-header">
                                    <span class="accordion-item-header-title"><?php echo $question; ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="lucide lucide-chevron-down accordion-item-header-icon">
                                        <path d="m6 9 6 6 6-6"/>
                                    </svg>
                                </div>
                                <div class="accordion-item-description-wrapper">
                                    <div class="accordion-item-description">
                                        <hr>
                                        <p><?php echo $answer; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>
