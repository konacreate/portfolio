<?php get_header(); ?>

<?php if (function_exists('bcn_display')) : ?>
  <!-- breadcrumb -->
  <div class="p-breadcrumb">
    <div class="p-breadcrumb__inner">
      <?php bcn_display(); // BreadcrumbNavXTのパンくずを表示するための記述 
      ?>
    </div>
  </div><!-- /p-breadcrumb -->
<?php endif; ?>

<div class="l-main">
  <section class="l-low__single">
    <div class="l-inner l-inner__narrow">
      <h1 class="c-heading --works">制作実績詳細</h1>
      <article class="p-article">
        <figure class="p-article__img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-salad.png" alt="">
        </figure>
        <ul class="p-article__list">
          <li class="p-article__item"><span class="p-article__label --accent">タイトル</span>
            <h2 class="p-article__text">コーポレートサイト</h2>
          </li>
          <li class="p-article__item"><span class="p-article__label">URL</span>
            <p class="p-article__text">https://global-standard.nazqq.com/</p>
          </li>
          <li class="p-article__item"><span class="p-article__label">担当範囲</span>
            <p class="p-article__text">コーディング、WordPress</p>
          </li>
          <li class="p-article__item"><span class="p-article__label">制作期間</span>
            <p class="p-article__text">13日</p>
          </li>
          <li class="p-article__item"><span class="p-article__label">費用目安</span>
            <p class="p-article__text">¥100,000〜¥150,000</p>
          </li>
          <li class="p-article__item --start"><span class="p-article__label">制作概要</span>
            <p class="p-article__text">・FLOCSSを採用<br>・自動再生のスライダー<br>・ドロワーメニュー展開時「ドロワーメニュー」と「ドロワーアイコン」のみフォーカスするようにjsで実装</p>
          </li>
        </ul>
      </article>
    </div>
    <div class="p-pickup">
      <div class="l-inner">
        <h3 class="p-pickup__heading">その他の制作実績</h3>
        <ul class="p-pickup__cards">
        <li class="p-works__card">
            <a href="" class="p-works__card-link --white">
              <figure class="p-works__img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-sakata.png" alt="">
              </figure>
              <div class="p-works__body">
                <h3 class="p-works__title">表参道カフェ風LPコーディングでま濃くてす</h3>
                <ul class="p-works__tag-list">
                  <li class="c-category">コーディング</li>
                  <li class="c-category">WordPress</li>
                  <li class="c-category">架空サイト</li>
                </ul>
              </div>
            </a>
          </li>
          <li class="p-works__card">
            <a href="" class="p-works__card-link --white">
              <figure class="p-works__img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-sakata.png" alt="">
              </figure>
              <div class="p-works__body">
                <h3 class="p-works__title">表参道カフェ風LP</h3>
                <ul class="p-works__tag-list">
                  <li class="c-category">コーディング</li>
                  <li class="c-category">WordPress</li>
                  <li class="c-category">架空サイト</li>
                </ul>
              </div>
            </a>
          </li>
          <li class="p-works__card">
            <a href="" class="p-works__card-link --white">
              <figure class="p-works__img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-sakata.png" alt="">
              </figure>
              <div class="p-works__body">
                <h3 class="p-works__title">表参道カフェ風LP</h3>
                <ul class="p-works__tag-list">
                  <li class="c-category">コーディング</li>
                  <li class="c-category">LP</li>
                  <li class="c-category">架空サイト</li>
                </ul>
              </div>
            </a>
          </li>
        </ul>
        <div class="p-pickup__button">
          <a href="" class="c-button">制作実績一覧へ戻る</a>
        </div>
      </div>
    </div>
  </section>

</div>


<?php get_footer(); ?>