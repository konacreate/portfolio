<?php 
/*
Template Name: contact
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
  <section class="p-contact l-low__contact">
    <div class="l-inner p-contact__inner">
      <h1 class="c-heading --contact">お問い合わせ</h1>
      <p class="p-contact__text">ご相談・お見積もりは無料で承ります。どんな些細なことでもお気軽にお問い合わせください。<br>ご入力いただいたメールアドレスに、24時間以内に返信いたします。</p>
      <?php echo do_shortcode('[contact-form-7 id="ec737ee" title="お問い合わせフォーム" html_id="contact-form" html_class="p-contact__form"]'); ?>
    </div>
  </section>
  <!-- /p-contact -->
</main>

<?php get_footer(); ?>