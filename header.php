<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon.png">

  <?php wp_head(); ?>
</head>

<body>
  <!-- ローディングアニメーション -->
  <div class="p-loading" id="loading">
    <div class="p-loading__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/sheep1.png" alt=""></div>
    <p class="p-loading__text c-animated__fadeInUp"><span>Kona's Portfolio</span></p>
  </div>
  <!-- /p-loading -->

  <!-- ヘッダー -->
  <div class="p-header__wrapper
  <?php if (is_front_page()): ?>
    <?php else : ?>
    --bg
    <?php endif; ?>">
    <header class="l-header p-header">
      <div class="l-header__inner">
        <?php if (is_front_page()): ?>
          <h1 href="" class="p-header__logo"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php else : ?>
          <div href="" class="p-header__logo"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></div>
        <?php endif; ?>
        <nav class="p-header__nav">
          <ul class="p-header__list">
            <li><a href="<?php echo esc_url(home_url('/works')); ?>" class="--works">制作実績</a></li>
            <?php if (is_front_page()): ?>
              <li><a href="#about" class="--about">私について</a></li>
            <?php else : ?>
              <li><a href="<?php echo esc_url(home_url('/#about')); ?>" class="--about">私について</a></li>
            <?php endif; ?>
            <li><a href="<?php echo esc_url(home_url('/blog')); ?>" class="--blog">ブログ</a></li>
          </ul>
          <a href="<?php echo esc_url(home_url('/contact')) ?>" class="p-header__button"><span>お問い合わせする</span></a>
        </nav>
        <button type="button" class="p-drawer__icon" aria-controls="drawer" aria-expanded="false" aria-label="メニューを開く">
          <div class="p-drawer__icon--circle"></div>
          <div class="p-drawer__icon--circle"></div>
          <div class="p-drawer__icon--circle"></div>
        </button>
      </div>
    </header>
  </div>
  <!-- /p-header__wrapper -->

  <!-- ドロワーメニュー -->
  <div id="drawer" class="p-drawer">
    <button type="button" class="p-drawer__close" aria-controls="drawer" aria-expanded="true" aria-label="メニューを閉じる">
      <span>×</span>
    </button>
    <div class="p-drawer__body">
      <a href="<?php echo home_url('/'); ?>" class="p-drawer__home">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/logo.webp" alt="Kona's Portfolio">
      </a>
      <ul class="p-drawer__list">
        <li><a href="<?php echo esc_url(home_url('/works')); ?>" class="--works">制作実績</a></li>
        <?php if (is_front_page()): ?>
          <li><a href="#about" class="--about">私について</a></li>
        <?php else : ?>
          <li><a href="<?php echo esc_url(home_url('/#about')); ?>" class="--about">私について</a></li>
        <?php endif; ?>
        <li><a href="<?php echo esc_url(home_url('/blog')) ?>" class="--blog">ブログ</a></li>
      </ul>
      <a href="<?php echo esc_url(home_url('/contact')) ?>" class="p-drawer__button">お問い合わせ</a>
    </div>
  </div>
  <!-- /p-drawer -->

  <!-- オーバーレイ -->
  <div class="p-drawer__overlay"></div>