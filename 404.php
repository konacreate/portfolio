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
  <div class="l-low__404">
    <div class="p-404">
      <picture class="p-404__img">
        <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/fv.webp">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/fv.png" alt="もこもこ" decoding="async">
        <div class="p-404__wrapper">
          <div class="p-404__heading">
            <span class="p-404__heading--sub">page not found</span>
            <h1 class="p-404__heading--main">404</h1>
          </div>
          <p class="p-404__text --lg">お探しのページが<br class="u-sp">見つかりませんでした。</p>
          <p class="p-404__text u-pc">ご覧になっていたページからのリンクが無効になっているか、<br>削除された可能性があります。</p>
          <div class="p-404__button u-pc">
            <a href="<?php echo esc_html(home_url('/')); ?>" class="c-button"><span>トップに戻る</span></a>
          </div>
        </div>
      </picture>
      <div class="l-inner">
        <p class="p-404__text u-sp">ご覧になっていたページからのリンクが無効になっているか、削除された可能性があります。</p>
        <div class="p-404__button u-sp">
          <a href="<?php echo esc_html(home_url('/')); ?>" class="c-button"><span>トップに戻る</span></a>
        </div>
      </div>
    </div>
    <!-- /p-404 -->
  </div>
  <!-- /l-low__404 -->
</main>

<?php get_footer(); ?>