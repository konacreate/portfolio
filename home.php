<?php get_header(); ?>

<?php if (function_exists('bcn_display')) : ?>
  <!-- breadcrumb -->
  <div class="p-breadcrumb">
    <div class="p-breadcrumb__inner">
      <?php bcn_display();
      ?>
    </div>
  </div><!-- /p-breadcrumb -->
<?php endif; ?>

<main class="l-main">
  <div class="l-low__blog">
    <div class="l-inner">
      <?php if (is_home()) : ?>
        <h1 class="c-heading --blog">
        <?php
          echo get_the_title(get_option('page_for_posts'));
          ?>
        </h1>
      <?php endif; ?>
      <div class="p-blog">
        <div class="p-blog__box">
          <p class="p-blog__text">ただいま準備中です...</p>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>