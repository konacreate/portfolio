<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <?php wp_head(); ?>
</head>

<body>
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
            <li><a href="" class="--works">制作実績</a></li>
            <li><a href="" class="--about">私について</a></li>
            <li><a href="" class="--blog">ブログ</a></li>
          </ul>
          <a href="" class="p-header__button">お問い合わせする</a>
        </nav>
        <button class="p-drawer__icon">
          <div class="p-drawer__icon--circle"></div>
          <div class="p-drawer__icon--circle"></div>
          <div class="p-drawer__icon--circle"></div>
        </button>
      </div>
    </header>
  </div>

  <!-- ドロワーメニュー -->
  <div class="p-drawer">
    <button class="p-drawer__close">
      ×
    </button>
    <div class="p-drawer__body">
      <a href="<?php echo home_url('/'); ?>" class="p-drawer__home">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/logo.svg" alt="Kona's Portfolio">
      </a>
      <ul class="p-drawer__list">
        <li><a href="" class="--works">制作実績</a></li>
        <li><a href="" class="--about">私について</a></li>
        <li><a href="" class="--blog">ブログ</a></li>
      </ul>
      <a href="" class="p-drawer__button">お問い合わせ</a>
    </div>
  </div>

  <div class="p-drawer__overlay"></div>