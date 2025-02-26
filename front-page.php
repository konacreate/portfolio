<?php get_header(); ?>

  <main class="l-main">
    <div class="l-fv p-fv">
      <div class="p-fv__inner">
        <div class="p-fv__wrapper">
          <div class="p-fv__text-wrapper">
            <p class="p-fv__title">Kona's Portfolio</p>
            <p class="p-fv__text">Webユーザーの視点で作る<br>わかりやすく直感的なコーディングをお届けします。</p>
          </div>
          <picture class="p-fv__img">
            <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/fv.png">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/fv.png" width="351" height="255" alt="もこもこ" decoding="async">
            <div class="p-fv__slider">
              <!-- Slider main container -->
              <div id="js-fv-swiper" class="swiper p-fv-swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper p-fv-swiper__wrapper">
                  <!-- Slides -->
                  <div class="swiper-slide p-fv-swiper__slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-salad.png" alt="表参道カフェ風サラダ"></div>
                  <div class="swiper-slide p-fv-swiper__slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-daymaga.png" alt="情報メディアサイト"></div>
                  <div class="swiper-slide p-fv-swiper__slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-global.png" alt="コーポレートサイト"></div>
                  <div class="swiper-slide p-fv-swiper__slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-sakata.png" alt="工務店"></div>
                </div>
              </div>
            </div>
          </picture>
        </div>
      </div>
    </div>

    <section class="l-top__works p-top-works">
      <div class="p-top-works__deco1">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/item1.svg" alt="もこもこ">
      </div>
      <div class="p-top-works__deco2">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/item2.svg" alt="もこもこ">
      </div>
      <div class="p-top-works__deco3">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/item3.svg" alt="もこもこ">
      </div>
      <div class="l-inner">
        <h2 class="c-heading --works">制作実績</h2>
        <ul class="p-top-works__cards u-sp">
          <li class="p-top-works__card">
            <div class="p-top-works__img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-global.png" alt="">
            </div>
            <div class="p-top-works__body">
              <h3 class="p-top-works__title">コーポレートサイト</h3>
              <ul class="p-top-works__list">
                <li class="c-category --green">コーディング</li>
                <li class="c-category --thin-green">WordPress</li>
                <li class="p-top-works__item">架空サイト</li>
              </ul>
            </div>
          </li>
          <li class="p-top-works__card">
            <div class="p-top-works__img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-global.png" alt="">
            </div>
            <div class="p-top-works__body">
              <h3 class="p-top-works__title">表参道カフェ風LP</h3>
              <ul class="p-top-works__list">
                <li class="p-top-works__item">コーディング</li>
                <li class="p-top-works__item">LP</li>
                <li class="p-top-works__item">架空サイト</li>
              </ul>
            </div>
          </li>
          <li class="p-top-works__card">
            <div class="p-top-works__img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-global.png" alt="">
            </div>
            <div class="p-top-works__body">
              <h3 class="p-top-works__title">コーポレートサイト</h3>
              <ul class="p-top-works__list">
                <li class="p-top-works__item">コーディング</li>
                <li class="p-top-works__item">LP</li>
                <li class="p-top-works__item">架空サイト</li>
              </ul>
            </div>
          </li>
          <li class="p-top-works__card">
            <div class="p-top-works__img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-global.png" alt="">
            </div>
            <div class="p-top-works__body">
              <h3 class="p-top-works__title">コーポレートサイト</h3>
              <ul class="p-top-works__list">
                <li class="p-top-works__item">コーディング</li>
                <li class="p-top-works__item">WordPress</li>
                <li class="p-top-works__item">架空サイト</li>
              </ul>
            </div>
          </li>
        </ul>

        <div class="p-top-works__slider u-pc">
          <!-- Slider main container -->
          <div id="js-works-swiper" class="swiper p-works-swiper">
            <!-- Additional required wrapper -->
            <ul class="swiper-wrapper p-works-swiper__wrapper">
              <!-- Slides -->
              <li class="swiper-slide p-works-swiper__slide">
                <div class="p-top-works__card">
                  <div class="p-top-works__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-global.png" alt="">
                  </div>
                  <div class="p-top-works__body">
                    <h3 class="p-top-works__title">コーポレートサイト</h3>
                    <ul class="p-top-works__list">
                      <li class="p-top-works__item">コーディング</li>
                      <li class="p-top-works__item">WordPress</li>
                      <li class="p-top-works__item">架空サイト</li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="swiper-slide p-works-swiper__slide">
                <div class="p-top-works__card">
                  <div class="p-top-works__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-global.png" alt="">
                  </div>
                  <div class="p-top-works__body">
                    <h3 class="p-top-works__title">コーポレートサイト</h3>
                    <ul class="p-top-works__list">
                      <li class="p-top-works__item">コーディング</li>
                      <li class="p-top-works__item">WordPress</li>
                      <li class="p-top-works__item">架空サイト</li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="swiper-slide p-works-swiper__slide">
                <div class="p-top-works__card">
                  <div class="p-top-works__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-global.png" alt="">
                  </div>
                  <div class="p-top-works__body">
                    <h3 class="p-top-works__title">コーポレートサイト</h3>
                    <ul class="p-top-works__list">
                      <li class="p-top-works__item">コーディング</li>
                      <li class="p-top-works__item">WordPress</li>
                      <li class="p-top-works__item">架空サイト</li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="swiper-slide p-works-swiper__slide">
                <div class="p-top-works__card">
                  <div class="p-top-works__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-global.png" alt="">
                  </div>
                  <div class="p-top-works__body">
                    <h3 class="p-top-works__title">コーポレートサイト</h3>
                    <ul class="p-top-works__list">
                      <li class="p-top-works__item">コーディング</li>
                      <li class="p-top-works__item">WordPress</li>
                      <li class="p-top-works__item">架空サイト</li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="swiper-slide p-works-swiper__slide">
                <div class="p-top-works__card">
                  <div class="p-top-works__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-global.png" alt="">
                  </div>
                  <div class="p-top-works__body">
                    <h3 class="p-top-works__title">コーポレートサイト</h3>
                    <ul class="p-top-works__list">
                      <li class="p-top-works__item">コーディング</li>
                      <li class="p-top-works__item">WordPress</li>
                      <li class="p-top-works__item">架空サイト</li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="swiper-slide p-works-swiper__slide">
                <div class="p-top-works__card">
                  <div class="p-top-works__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-global.png" alt="">
                  </div>
                  <div class="p-top-works__body">
                    <h3 class="p-top-works__title">コーポレートサイト</h3>
                    <ul class="p-top-works__list">
                      <li class="p-top-works__item">コーディング</li>
                      <li class="p-top-works__item">WordPress</li>
                      <li class="p-top-works__item">架空サイト</li>
                    </ul>
                  </div>
                </div>
              </li>
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
        <div class="p-top-works__button">
          <a href="" class="c-button">制作実績一覧を見る</a>
        </div>
      </div>
    </section>
    <!-- /l-top-works p-top-works -->

    <section class="l-top__service p-top-service">
      <div class="l-inner">
        <h2 class="c-heading --service">できること</h2>
        <ul class="p-top-service__list">
          <li class="p-top-service__item">
            <div class="p-top-service__img">
              <img class="u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/service1.png" alt="アイコン：パソコン" width="262" height="180">
              <img class="u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/service1.png" alt="アイコン：パソコン" width="334" height="245">
            </div>
            <h3 class="p-top-service__title">HP・LPの制作・修正</h3>
            <p class="p-top-service__text">デザインカンプに基づいた忠実な実装と意味付けされたHTMLマークアップを行います。<br>さらに、ページの読み込み速度向上とWebサイトの使いやすさの向上を目指し、コードの最適化および圧縮を実施します。</p>
          </li>
          <li class="p-top-service__item">
            <div class="p-top-service__img">
              <img class="u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/service2.png" alt="アイコン：WordPress" width="262" height="180">
              <img class="u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/service2.png" alt="アイコン：WordPress" width="334" height="245">
            </div>
            <h3 class="p-top-service__title">WordPress構築</h3>
            <p class="p-top-service__text">HTMLサイトのWordPress化、オリジナルテーマの制作を承っております。<br>お問合せフォームやブログ機能など、標準的な機能の追加やカスタマイズもご相談ください。</p>
          </li>
          <li class="p-top-service__item">
            <div class="p-top-service__img">
              <img class="u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/sp/service3.png" alt="アイコン：スマホとループ" width="262" height="180">
              <img class="u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/service2.png" alt="アイコン：スマホとループ" width="334" height="245">
            </div>
            <h3 class="p-top-service__title">レスポンシブ対応</h3>
            <p class="p-top-service__text">デザインカンプがPC向けのみで提供された場合でも、各デバイスに対応できるよう実装いたします。<br>完成後にイメージにズレが生じないよう、事前に確認をお願いすることがあります。</p>
          </li>
        </ul>
      </div>
    </section>
    <!-- /l-top__service /p-service -->

    <section class="l-top__about p-top-about">
      <div class="l-inner">
        <h2 class="c-heading --about u-sp">私について</h2>
        <div class="p-top-about__wrapper">
          <div class="p-top-about__img">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about-img.png" alt="こうなのアイコン" width="400" height="400">
          </div>
          <div class="p-top-about__text-wrapper">
            <h2 class="c-heading --about u-pc">私について</h2>
            <div class="p-top-about__name">
              <h3 class="p-top-about__heading">こうな/Webコーダー</h3>
              <p class="p-top-about__text">1992年生まれ、群馬県出身、新潟県在住。<br>現在、個人事業のWebコーダーとして活動しております。</p>
            </div>
            <div class="p-top-about__carrier">
              <h4 class="p-top-about__heading">経歴</h4>
              <p class="p-top-about__text">前職では医療機関や製造業の事務職として約10年間、幅広い業務に携わってきました。<br>地域の患者様と同じ目線で暮らしの困りごとを共に解決してきた経験は、コーディングにも活かされています。<br>『ユーザーにとって最善のサイトとは何か？』を常に考え、お客様の課題解決をお手伝いします。</p>
            </div>
          </div>
        </div>
        <div class="p-top-about__policy">
          <h3 class="p-top-about__policy-title"><span>3</span>つの基本的な方針</h3>
          <ul class="p-top-about__list">
            <li class="p-top-about__item">
              <div class="p-top-about__policy-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/policy1.png" alt="アイコン：ハートを抱える手" width="169" height="137">
              </div>
              <h4 class="p-top-about__policy-heading">ユーザー目線のコーディング</h4>
              <p class="p-top-about__policy-text">ユーザー目線を最優先し、使いやすさを追求したコーディングを徹底します。</p>
            </li>
            <li class="p-top-about__item">
              <div class="p-top-about__policy-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/policy2.png" alt="アイコン：メール" width="169" height="137">
              </div>
              <h4 class="p-top-about__policy-heading">迅速なコミュニケーション</h4>
              <p class="p-top-about__policy-text">お客様のお時間を大切にし、迅速かつ丁寧なコミュニケーションを心がけています。</p>
            </li>
            <li class="p-top-about__item">
              <div class="p-top-about__policy-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/policy3.png" alt="アイコン：分析" width="169" height="137">
              </div>
              <h4 class="p-top-about__policy-heading">徹底した品質チェック</h4>
              <p class="p-top-about__policy-text">高品質なサイトをお届けするため、徹底した品質チェックを行います。</p>
            </li>
          </ul>
        </div>
        <div class="p-top-about__skill">
          <div class="p-top-about__content">
            <p class="p-top-about__skill-heading">【使用言語】</p>
            <p class="p-top-about__skill-text">HTML/CSS(SCSS)/JavaScript(jQuery・GSAP)/PHP</p>
          </div>
          <div class="p-top-about__content">
            <p class="p-top-about__skill-heading">【CMS】</p>
            <p class="p-top-about__skill-text">WordPress</p>
          </div>
          <div class="p-top-about__content">
            <p class="p-top-about__skill-heading">【使用ツール】</p>
            <p class="p-top-about__skill-text">Figma/XD/ Illustrator/Photoshop/Git(GitHub)/Gulp</p>
          </div>
          <div class="p-top-about__content">
            <p class="p-top-about__skill-heading">【稼働時間】</p>
            <p class="p-top-about__skill-text --time">平日：9時〜18時</p>
            <p class="p-top-about__skill-text --time">土日祝でも柔軟に対応いたしますので、お気軽にご相談ください。</p>
            <p class="p-top-about__skill-text --time">お休みをいただく場合は別途ご連絡させていただきます。</p>
          </div>
        </div>
      </div>
    </section>
    <!-- /l-top__about /p-about -->
  </main>

<?php get_footer(); ?>