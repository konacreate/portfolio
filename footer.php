<footer class="p-footer">
  <div class="p-footer__top">
    <div class="l-inner p-footer__inner">
      <div class="p-footer__left">
        <p class="p-footer__logo">Kana's Portfolio</p>
      </div>
      <div class="p-footer__right">
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
      </div>
    </div>
    <div class="p-footer__deco1 sheep1">
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
    <small>&copy;2026 kana's Portfolio,All Rights Reserved.</small>
  </div>
</footer>
<!-- /p-footer -->

<?php wp_footer(); ?>
</body>

</html>