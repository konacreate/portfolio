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
    <?php
    $term_var = get_the_terms($post->ID, 'genre');
    $related_query = new WP_Query(
      array(
        'post_type' => 'works',
        'posts_per_page' => 3,
        'post__not_in' => array($post->ID),
        'tax_query' => array(
          array(
            'taxonomy' => 'genre',
            'field' => 'slug',
            'terms' => $term_var[0]->slug,
          )
        )
      )
    );
    ?>
    <?php if ($related_query->have_posts()) : ?>
      <div class="p-pickup">
        <div class="l-inner">
          <h3 class="p-pickup__heading">その他の制作実績</h3>
          <ul class="p-pickup__cards">
            <?php while ($related_query->have_posts()) : ?>
              <?php $related_query->the_post(); ?>
              <li class="p-works__card">
                <a href="<?php the_permalink(); ?>" class="p-works__card-link --white">
                  <figure class="p-works__img">
                    <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail('my_thumbnail');
                    } else {
                      echo '<img src="' .  esc_url(get_template_directory_uri()) . '/assets/img/noimg.png" alt="画像なし">';
                    }
                    ?>
                  </figure>
                  <div class="p-works__body">
                    <h3 class="p-works__title"><?php the_title(); ?></h3>
                    <?php
                      $terms = get_the_terms(get_the_ID(), 'genre');
                    if ($terms) : ?>
                    <ul class="p-works__tag-list">
                      <?php foreach($terms as $term) : ?>
                      <li class="c-category"><?php echo esc_html($term->name); ?></li>
                      <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                  </div>
                </a>
              </li>
            <?php endwhile; ?>
          </ul>
          <div class="p-pickup__button">
            <a href="<?php echo home_url('/works'); ?>" class="c-button">制作実績一覧へ戻る</a>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </section>

</div>


<?php get_footer(); ?>