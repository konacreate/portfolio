<?php get_header(); ?>

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
  <section class="l-low__single">
    <div class="l-inner l-inner__narrow">
      <h1 class="c-heading --works">制作実績詳細</h1>
      <?php
      if (have_posts()) :
        while (have_posts()) :
          the_post();
      ?>
          <article class="p-article">
            <figure class="p-article__img">
              <?php
              if (has_post_thumbnail()) {
                the_post_thumbnail('my_thumbnail');
              } else {
                echo '<img src="' .  esc_url(get_template_directory_uri()) . '/assets/img/noimg.png" alt="画像なし">';
              }
              ?>
            </figure>
            <ul class="p-article__list">
              <li class="p-article__item"><span class="p-article__label --accent">タイトル</span>
                <h2 class="p-article__text"><?php the_title(); ?></h2>
              </li>
              <li class="p-article__item"><span class="p-article__label">URL</span>
                <a href="<?php the_field('url'); ?>" class="p-article__text --link" target="_blank" rel="noopener noreferrer"><?php the_field('url'); ?></a>
              </li>
              <?php if (get_field('basic')) : ?>
                <li class="p-article__item">
                  <span class="p-article__label">Basic認証</span>
                  <p class="p-article__text"><?php the_field('basic'); ?></p>
                </li>
              <?php endif; ?>
              <li class="p-article__item"><span class="p-article__label">担当範囲</span>
                <p class="p-article__text"><?php the_field('position'); ?></p>
              </li>
              <li class="p-article__item"><span class="p-article__label">制作期間</span>
                <p class="p-article__text"><?php the_field('term'); ?></p>
              </li>
              <li class="p-article__item"><span class="p-article__label">費用目安</span>
                <p class="p-article__text"><?php the_field('price'); ?></p>
              </li>
              <li class="p-article__item --start"><span class="p-article__label">制作概要</span>
                <p class="p-article__text"><?php echo nl2br(get_field('overview')); ?></p>
              </li>
            </ul>
          </article>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <?php
$term_var = get_the_terms($post->ID, 'genre');

if ($term_var && !is_wp_error($term_var)) {
    $excluded_slugs = array('coding', 'sample');
    $included_slugs = array();
    foreach ($term_var as $term) {
        if (!in_array($term->slug, $excluded_slugs)) {
            $included_slugs[] = $term->slug;
        }
    }
    if (!empty($included_slugs)) {
        $related_query = new WP_Query(
            array(
                'post_type'      => 'works',
                'posts_per_page' => 3,
                'post__not_in'   => array($post->ID),
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'genre',
                        'field'    => 'slug',
                        'terms'    => $included_slugs,
                        'operator' => 'IN',
                    ),
                ),
            )
        );
    }
}
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
                    <img src="<?php the_field('img'); ?>" alt="">
                    <p class="p-works__detail">詳細を見る</p>
                  </figure>
                  <div class="p-works__body">
                    <h4 class="p-works__title"><?php the_title(); ?></h4>
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'genre');
                    if ($terms) : ?>
                      <ul class="p-works__tag-list">
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
          <div class="p-pickup__button">
            <a href="<?php echo esc_url(home_url('/works')); ?>" class="c-button"><span>制作実績一覧へ戻る</span></a>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </section>
  <!-- /p-article -->
</main>

<?php get_footer(); ?>