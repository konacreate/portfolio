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
  <section class="p-works l-low__works">
    <div class="l-inner">
      <h1 class="c-heading --works">制作実績一覧</h1>
      <ul class="p-works__category-list">
        <?php
        // 現在のページ情報を取得
        $cat = get_queried_object();
        $current_slug = isset($cat->slug) ? $cat->slug : '';

        // 「すべて（アーカイブページ）」の is-active 判定
        $is_active_all = (is_post_type_archive('works') || is_home()) ? ' is-active' : '';
        ?>

        <li class="p-works__category-item">
          <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="p-works__category-link<?php echo $is_active_all; ?>">すべて</a>
        </li>
        <?php
        $args = ['wordpress', 'lp'];
        $genre_terms = get_terms('genre', array('hide_empty' => false));
        if ($genre_terms) :
          foreach ($genre_terms as $genre_term) :
            if (in_array($genre_term->slug, $args)):
              $is_active = ($genre_term->slug === $current_slug) ? ' is-active' : '';
        ?>
              <li class="p-works__category-item"><a href="<?php echo esc_url(get_term_link($genre_term, 'genre')); ?>" class="p-works__category-link<?php echo $is_active; ?>"><?php echo esc_html($genre_term->name); ?></a></li>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
      <?php if (have_posts()) : ?>
        <ul class="p-works__cards">
          <?php
          while (have_posts()) :
            the_post(); ?>
            <li class="p-works__card">
              <a href="" class="p-works__card-link">
                <figure class="p-works__img">
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail('my_thumbnail');
                  } else {
                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/noimg.png" alt="画像なし">';
                  }
                  ?>
                </figure>
                <div class="p-works__body">
                  <h2 class="p-works__title"><?php the_title(); ?></h2>
                  <?php if (get_the_terms(get_the_ID(), 'genre')) : ?>
                    <ul class="p-works__tag-list">
                      <li class="c-category"><?php echo esc_html(get_the_terms(get_the_ID(), 'genre')[0]->name); ?></li>
                    </ul>
                  <?php endif; ?>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
    </div>
  </section>
</div>

<?php get_footer(); ?>