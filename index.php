<?php get_header(); ?>

  <main role="main" aria-label="Content">
      <?php
      get_template_part('partials/index', "intro");
      get_template_part('partials/index', "tab");
      get_template_part('partials/index', "new");
      get_template_part('partials/index', "intro2");
      get_template_part('partials/index', "most-sales");
      get_template_part('partials/index', "blog");
      get_template_part('partials/index', "brands");
      ?>
  </main>

<?php get_footer(); ?>
