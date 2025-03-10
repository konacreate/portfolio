<footer class="p-footer">
  <div class="p-footer__top">
    <div class="l-inner p-footer__inner">
      <div class="p-footer__left">
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="p-footer__button--contact"><span>フォームからお問い合わせ</span></a>
        <nav class="p-footer__nav">
          <ul class="p-footer__list">
            <li class="p-footer__item">
              <a href="<?php echo esc_url(home_url('/works')); ?>" class="--works">制作実績</a>
            </li>
            <?php if (is_front_page()): ?>
              <li class="p-footer__item"><a href="#about" class="--about">私について</a></li>
            <?php else : ?>
              <li class="p-footer__item"><a href="<?php echo esc_url(home_url('/#about')); ?>" class="--about">私について</a></li>
            <?php endif; ?>
            <li class="p-footer__item">
              <a href="<?php echo esc_url(home_url('/blog')); ?>" class="--blog">ブログ</a>
            </li>
          </ul>
        </nav>
        <p class="p-footer__logo">Kona's Portfolio</p>
      </div>
      <div class="p-footer__right">
        <div class="p-footer__x-wrapper">
          <a href="https://x.com/konadori" target="_blank" rel="nofollow noopener" class="p-footer__button--x"><span>Xからお問い合わせ</span></a>
          <p class="p-footer__message">日々の活動記録も発信しています。<br>お気軽にDMをお送りください。</p>
        </div>
        <div class="p-footer__x">
          <a class="twitter-timeline" href="https://twitter.com/konadori?ref_src=twsrc%5Etfw">Tweets by konadori</a>
          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>
    <div class="p-footer__deco1 sheep">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sheep1.png" alt="羊1" width="62" height="44">
    </div>
    <div class="p-footer__deco2 sheep2">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sheep2.png" alt="羊2" width="61" height="46">
    </div>
    <div class="p-footer__deco3 sheep3">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sheep3.png" alt="羊3" width="44" height="33">
    </div>
  </div>
  <div class="p-footer__bottom">
    <small>&copy;2025 Kona's Portfolio,All Rights Reserved.</small>
  </div>
</footer>
<!-- /p-footer -->

<a href="https://x.com/konadori" target="_blank" rel="nofollow noopener" class="p-cta">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cta-x.png" alt="Xアイコン" width="102" height="102">
</a>

<?php wp_footer(); ?>
</body>

</html>