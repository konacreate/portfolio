<?php get_header(); ?>

<main class="l-main">
  <div class="l-fv p-fv">
    <div class="p-fv__inner">
      <div class="p-fv__wrapper">
        <div class="p-fv__text-wrapper">
          <p class="p-fv__title c-animated__blur"><span>Kona's Portfolio</span></p>
          <p class="p-fv__text c-animated__text">丁寧で正確に、伝わるWebを。</p>
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
      <h2 class="c-heading --works c-animated__fadeIn --delay0">制作実績</h2>
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
            <li class="c-animated__fadeIn --delay0">
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
        <div class="p-top-works__slider u-pc c-animated__slideInRight">
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
      <h2 class="c-heading --service c-animated__fadeIn --delay0">できること</h2>
      <ul class="p-top-service__list">
        <li class="p-top-service__item">
          <div class="p-top-service__img c-animated__clipView">
            <img class="u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/service1.png" alt="アイコン：パソコン" width="262" height="180">
            <img class="u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/service1.webp" alt="アイコン：パソコン" width="334" height="245">
          </div>
          <h3 class="p-top-service__title c-animated__fadeIn --delay0">HP・LPの制作・修正</h3>
          <p class="p-top-service__text c-animated__fadeIn --delay1">デザインカンプに基づいた忠実な実装と意味付けされたHTMLマークアップを行います。<br>さらに、ページの読み込み速度向上とWebサイトの使いやすさの向上のため、コードの最適化および圧縮を実施します。</p>
        </li>
        <li class="p-top-service__item">
          <div class="p-top-service__img c-animated__clipView">
            <img class="u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/service2.png" alt="アイコン：WordPress" width="262" height="180">
            <img class="u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/service2.webp" alt="アイコン：WordPress" width="334" height="245">
          </div>
          <h3 class="p-top-service__title c-animated__fadeIn --delay0">WordPress構築</h3>
          <p class="p-top-service__text c-animated__fadeIn --delay1">HTMLサイトのWordPress化、オリジナルテーマの制作を承っております。<br>お問合せフォームやブログ機能など、標準的な機能の追加やカスタマイズもご相談ください。</p>
        </li>
        <li class="p-top-service__item">
          <div class="p-top-service__img c-animated__clipView">
            <img class="u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/service3.png" alt="アイコン：スマホとループ" width="262" height="180">
            <img class="u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/service3.webp" alt="アイコン：スマホとループ" width="334" height="245">
          </div>
          <h3 class="p-top-service__title c-animated__fadeIn --delay0">レスポンシブ対応</h3>
          <p class="p-top-service__text c-animated__fadeIn --delay1">デザインカンプがPC向けのみで提供された場合でも、各デバイスに対応できるよう実装いたします。<br>完成後にイメージにズレが生じないよう、事前に確認をお願いすることがあります。</p>
        </li>
      </ul>
    </div>
  </section>
  <!-- /l-top__service /p-service -->

  <section id="about" class="l-top__about p-top-about">
    <div class="l-inner">
      <h2 class="c-heading --about u-sp c-animated__scroll-blur --delay0">私について</h2>
      <div class="p-top-about__wrapper">
        <div class="p-top-about__img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about-img.webp" alt="こうなのアイコン" width="400" height="400">
        </div>
        <div class="p-top-about__text-wrapper">
          <h2 class="c-heading --about u-pc c-animated__scroll-blur --delay0">私について</h2>
          <div class="p-top-about__introduce c-animated__scroll-blur --delay1">
            <h3 class="p-top-about__heading">こうな/Webコーダー</h3>
            <p class="p-top-about__text">1992年生まれ、群馬県出身、新潟県在住。<br>2024年11月開業。現在、フリーランスWebコーダーとして活動しています。</p>
          </div>
          <div class="p-top-about__carrier c-animated__scroll-blur --delay2">
            <h4 class="p-top-about__heading">経歴</h4>
            <p class="p-top-about__text">前職では経理を中心に、医療機関や製造業の事務職として約10年間従事しました。結婚による環境の変化をきっかけに以前から興味があったWeb業界に転身。<br>専門職と関わる機会が多い中で、「相手に負担をかけさせずにスムーズに進めるにはどうすればよいか」を考え、行動することを大切にしてきました。<br>この姿勢はコーディング実務にも活かされ、クライアント様から「コミュニケーションがスムーズで安心して進行できる」と評価をいただいています。<br>今後もユーザー目線のコーディングと円滑なプロジェクト進行に貢献してまいります。<br><br>資格：コーディング実務検定 合格</p>
          </div>
        </div>
      </div>
      <div class="p-top-about__policy">
        <h3 class="p-top-about__policy-title c-animated__fadeIn --delay0"><span>3</span>つの基本的な方針</h3>
        <ul class="p-top-about__list">
          <li class="p-top-about__item">
            <div class="p-top-about__policy-img c-animated__clipView">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/policy1.webp" alt="アイコン：ハートを抱える手" width="169" height="137">
            </div>
            <h4 class="p-top-about__policy-heading c-animated__scroll-blur --delay0">ユーザー目線のコーディング</h4>
            <p class="p-top-about__policy-text c-animated__scroll-blur --delay1">ユーザー目線を最優先し、キーボード操作やアクセシビリティ、アニメーションを最適化します。</p>
          </li>
          <li class="p-top-about__item">
            <div class="p-top-about__policy-img c-animated__clipView">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/policy2.webp" alt="アイコン：メール" width="169" height="137">
            </div>
            <h4 class="p-top-about__policy-heading c-animated__scroll-blur --delay0">誠実なコミュニケーション</h4>
            <p class="p-top-about__policy-text c-animated__scroll-blur --delay1">確認事項はまとめて行い、定期的に進捗をご報告することでお客様の時間と信頼を大切にします。</p>
          </li>
          <li class="p-top-about__item">
            <div class="p-top-about__policy-img c-animated__clipView">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/policy3.webp" alt="アイコン：分析" width="169" height="137">
            </div>
            <h4 class="p-top-about__policy-heading c-animated__scroll-blur --delay0">徹底した品質管理</h4>
            <p class="p-top-about__policy-text c-animated__scroll-blur --delay1">品質チェックシートを最大限に活用するため、複数回チェックすることで精度を高めています。</p>
          </li>
        </ul>
      </div>
      <div class="p-top-about__skill c-animated__fadeIn --delay1">
        <div class="p-top-about__content">
          <p class="p-top-about__skill-heading">【使用言語】</p>
          <p class="p-top-about__skill-text">HTML/CSS(SCSS)/<br class="u-sp">JavaScript(jQuery・GSAP)/PHP</p>
        </div>
        <div class="p-top-about__content">
          <p class="p-top-about__skill-heading">【CSS設計手法】</p>
          <p class="p-top-about__skill-text">FLOCSS(BEMも可)</p>
        </div>
        <div class="p-top-about__content">
          <p class="p-top-about__skill-heading">【使用ツール(デザインは書き出し専用)】</p>
          <p class="p-top-about__skill-text">Figma/XD/ Illustrator/Photoshop/<br class="u-sp">Git(GitHub)/Gulp
          </p>
        </div>
        <div class="p-top-about__content">
          <p class="p-top-about__skill-heading">【稼働時間】</p>
          <p class="p-top-about__skill-text --time">平日：9時〜21時</p>
          <p class="p-top-about__skill-text --time">土日祝でも柔軟に対応いたしますので、お気軽にご相談ください。</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /l-top__about /p-about -->
</main>

<?php get_footer(); ?>