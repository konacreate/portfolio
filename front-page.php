<?php get_header(); ?>

<main class="l-main">
  <div class="l-fv p-fv">
    <div class="p-fv__inner">
      <div class="p-fv__wrapper">
        <div class="p-fv__text-wrapper">
          <p class="p-fv__title"><span>Kana's Portfolio</span></p>
          <p class="p-fv__text">丁寧に正確に、伝わるWebを</p>
        </div>
        <picture class="p-fv__img">
          <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/fv.webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/fv.webp" width="351" height="255" alt="もこもこ" decoding="async" fetchpriority="high">
          <div class="p-fv__slider">
            <!-- Slider main container -->
            <div id="js-fv-swiper" class="swiper p-fv-swiper">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper p-fv-swiper__wrapper">
                <!-- Slides -->
                <div class="swiper-slide p-fv-swiper__slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-salad.webp" alt="表参道カフェ風サラダ" width="516" height="338" fetchpriority="high"></div>
                <div class="swiper-slide p-fv-swiper__slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-daymaga.webp" alt="情報メディアサイト" width="516" height="338"></div>
                <div class="swiper-slide p-fv-swiper__slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-global.webp" alt="コーポレートサイト" width="516" height="338"></div>
                <div class="swiper-slide p-fv-swiper__slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-sakata.webp" alt="工務店" width="516" height="338"></div>
              </div>
            </div>
          </div>
        </picture>
      </div>
    </div>
  </div>
  <!-- /p-fv -->

  <section class="l-top__works p-top-works">
    <div class="p-top-works__deco1">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/item1.svg" alt="もこもこ" width="40" height="40">
    </div>
    <div class="p-top-works__deco2">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/item2.svg" alt="もこもこ" width="73" height="73">
    </div>
    <div class="p-top-works__deco3">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/item3.svg" alt="もこもこ" width="40" height="40">
    </div>
    <div class="l-inner">
      <h2 class="c-heading --works">制作実績</h2>
      <?php
      $args = array(
        'post_type' => 'works',
        'posts_per_page' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => 'works-tag',
            'field' => 'slug',
            'terms' => 'pickup',
          ),
        ),
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) : ?>
        <ul class="p-top-works__cards u-sp">
          <?php while ($query->have_posts()): $query->the_post(); ?>
            <li>
              <a href="<?php the_permalink(); ?>" class="p-top-works__card">
                <figure class="p-top-works__img">
                  <img src="<?php the_field('img'); ?>" alt="">
                  <p class="p-top-works__detail">詳細を見る</p>
                  <div class="p-top-works__detail-wrapper">
                  </div>
                </figure>
                <div class="p-top-works__body">
                  <h3 class="p-top-works__title"><?php the_title(); ?></h3>
                  <?php
                  $terms = get_the_terms(get_the_ID(), 'genre');
                  if ($terms) : ?>
                    <ul class="p-top-works__list">
                      <?php foreach ($terms as $term) : ?>
                        <?php echo '<li class="c-category " style="' . esc_attr('background:' . get_field('color', $term)) . '">' . esc_html($term->name) . '</li>' ?>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>

      <?php
      $args = array(
        'post_type' => 'works',
        'posts_per_page' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => 'works-tag',
            'field' => 'slug',
            'terms' => 'pickup',
          ),
        ),
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) : ?>
        <div class="p-top-works__slider u-pc">
          <!-- Slider main container -->
          <div id="js-works-swiper" class="swiper p-works-swiper">
            <!-- Additional required wrapper -->
            <ul class="swiper-wrapper p-works-swiper__wrapper ">
              <!-- Slides -->
              <?php while ($query->have_posts()): $query->the_post(); ?>
                <li class="swiper-slide p-works-swiper__slide ">
                  <a href="<?php the_permalink(); ?>" class="p-top-works__card">
                    <figure class="p-top-works__img">
                      <img src="<?php the_field('img'); ?>" alt="">
                      <p class="p-top-works__detail">詳細を見る</p>
                    </figure>
                    <div class="p-top-works__body">
                      <h3 class="p-top-works__title"><?php the_title(); ?></h3>
                      <?php
                      $terms = get_the_terms(get_the_ID(), 'genre');
                      if ($terms) : ?>
                        <ul class="p-top-works__list">
                          <?php foreach ($terms as $term) : ?>
                            <?php echo '<li class="c-category " style="' . esc_attr('background:' . get_field('color', $term)) . '">' . esc_html($term->name) . '</li>' ?>
                          <?php endforeach; ?>
                        </ul>
                      <?php endif; ?>
                    </div>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
            <!-- If we need pagination -->
            <div class="swiper-pagination p-works-swiper__pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="p-works-swiper__icon">
              <div class="swiper-button-prev p-works-swiper__prev"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M12.7069 17.293L8.41394 13H17.9999V11H8.41394L12.7069 6.70697L11.2929 5.29297L4.58594 12L11.2929 18.707L12.7069 17.293Z" />
                </svg></div>
              <div class="swiper-button-next p-works-swiper__next"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M11.293 17.293L12.707 18.707L19.414 12L12.707 5.29297L11.293 6.70697L15.586 11H6V13H15.586L11.293 17.293Z" />
                </svg></div>
            </div>
          </div>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
      <div class="p-top-works__button c-animated__scroll-blur --delay0">
        <a href="<?php echo esc_url(home_url('/works')); ?>" class="c-button"><span>制作実績一覧を見る</span></a>
      </div>
    </div>
  </section>
  <!-- /l-top-works p-top-works -->

  <section class="l-top__service p-top-service">
    <div class="l-inner">
      <h2 class="c-heading --service">サービス内容</h2>
      <ul class="p-top-service__list">
        <li class="p-top-service__item">
          <picture class="p-top-service__img">
            <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/service1.webp">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/service1.png" alt="アイコン：パソコン" width="262" height="180" decoding="async">
          </picture>
          <h3 class="p-top-service__title">対応範囲</h3>
          <p class="p-top-service__text">サイトのコンセプトに合わせたアニメーションの実装やご提案をはじめ、各種デバイスに最適化するレスポンシブ対応まで幅広く対応。<br>開発時は適切なGitを行い、安全かつスムーズなコミュニケーションを徹底。<br>また、直感的に運用できるヘッドレスCMS「microCMS」を組み合わせた、コンテンツ管理システムの構築も可能です。</p>
        </li>
        <li class="p-top-service__item">
          <picture class="p-top-service__img">
            <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/service2.webp">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/service2.png" alt="アイコン：WordPress" width="262" height="180">
          </picture>
          <h3 class="p-top-service__title">CMS構築</h3>
          <p class="p-top-service__text">WordPressやmicroCMSを使用したサイトの構築を承っております。<br>単にデザインを形にするだけでなく、納品後の「セキュリティ」や「集客力」、「運用のしやすさ」を追求したカスタマイズを行います。</p>
        </li>
        <li class="p-top-service__item">
          <picture class="p-top-service__img">
            <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/service3.webp">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/service3.png" alt="アイコン：スマホとループ" width="262" height="180" decoding="async">
          </picture>
          <h3 class="p-top-service__title">進行しやすいサポート</h3>
          <p class="p-top-service__text">
            WordPressやmicroCMSの管理画面操作マニュアルの作成、進捗報告を当たり前に行っています。<br>ご報告の際はディレクター様のお客様へそのままご共有いただけるよう、内容を整理いたします。<br>修正案件の際は、いただいた指示だけでなく「他にも対応すべき箇所がないか？」を確認し手戻りがないようにしています。
          </p>
        </li>
      </ul>
    </div>
  </section>
  <!-- /l-top__service /p-service -->

  <section id="about" class="l-top__about p-top-about">
    <div class="l-inner">
      <h2 class="c-heading --about u-sp">私について</h2>
      <div class="p-top-about__wrapper">
        <div class="p-top-about__img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about-img.webp" alt="プロフィール画像" width="400" height="400">
        </div>
        <div class="p-top-about__text-wrapper">
          <h2 class="c-heading --about u-pc">私について</h2>
          <div class="p-top-about__introduce">
            <h3 class="p-top-about__heading">しらいし かな/Webコーダー</h3>
            <p class="p-top-about__text">1992年生まれ、2024年11月に開業。<br>現在、新潟県を中心に個人事業でホームページ制作や公開後の保守・運用を承っています。<br>WordPressはもちろん、AstroやmicroCMSを使用したサイトも対応しています。<br>お客様の課題や運用の形に合わせて、最適なご提案をいたします。</p>
          </div>
        </div>
      </div>
      <div class="p-top-about__skill">
        <div class="p-top-about__content">
          <h4 class="p-top-about__skill-heading">使用言語</h4>
          <p class="p-top-about__skill-text">Astro/PHP/HTML5/CSS3(SCSS)/JavaScript(jQuery・GSAP)</p>
        </div>
        <div class="p-top-about__content">
          <h4 class="p-top-about__skill-heading">CMS</h4>
          <p class="p-top-about__skill-text">WordPress/microCMS</p>
        </div>
        <div class="p-top-about__content">
          <h4 class="p-top-about__skill-heading">デザイン連携・ツール</h4>
          <p class="p-top-about__skill-text">Figma/XD/ Illustrator/Photoshop/Git/GitHub
          </p>
        </div>
        <div class="p-top-about__content">
          <h4 class="p-top-about__skill-heading">稼働時間</h4>
          <p class="p-top-about__skill-text">平日：9時〜20時</p>
          <p class="p-top-about__skill-text">土日祝でも柔軟に対応いたしますので、お気軽にご相談ください。</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /l-top__about /p-about -->
</main>

<?php get_footer(); ?>