<?php 
/*
Template Name: contact-thanks
*/

get_header(); ?>

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
  <section class="l-low__contact p-contact">
    <div class="l-inner">
      <h1 class="c-heading --contact">お問い合わせ</h1>
      <p class="p-contact-thanks__text">お問い合わせありがとうございました。<br>24時間以内に返信いたしますので、しばらくお待ちいただけますと幸いです。<br></p>
      <div class="p-contact-thanks__button">
        <a href="<?php echo esc_url(home_url('/')) ?>" class="c-button"><span>トップに戻る</span></a>
      </div>
    </div>
  </section>
  <!-- /p-contact -->
</main>

<?php get_footer(); ?>