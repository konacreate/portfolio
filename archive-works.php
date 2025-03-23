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
  <section class="p-works l-low__works">
    <div class="l-inner">
      <h1 class="c-heading --works">制作実績一覧</h1>
      <ul class="p-works__category-list">
        <li class="p-works__category-item">
          <?php
          $is_active = is_post_type_archive('works') ? 'is-active' : '';
          $link = esc_url(get_post_type_archive_link('works'));
          if ($is_active) {
            echo '<p class="p-works__category-link all is-active">すべて</p>';
          } else {
            echo '<a href="' . $link . '" class="p-works__category-link all">すべて</a>';
          }
          ?>
        </li>
        <?php
        $args = ['wordpress', 'lp'];
        $cat = get_queried_object();
        $cat_name = $cat->name;
        $genre_terms = get_terms('genre', array('hide_empty' => false));
        if ($genre_terms) :
          foreach ($genre_terms as $genre_term) :
            if (in_array($genre_term->slug, $args)):
              $is_active_genre = ($cat_name == esc_html($genre_term->name)) ? 'is-active' : '';
              $term_link = esc_url(get_term_link($genre_term, 'genre'));
        ?>
              <li class="p-works__category-item">
                <?php
                if ($is_active_genre) {
                  echo '<p class="p-works__category-link ' . esc_attr($genre_term->slug) . ' is-active">' . esc_html($genre_term->name) . '</p>';
                } else {
                  echo '<a href="' . $term_link . '" class="p-works__category-link ' . esc_attr($genre_term->slug) . '">' . esc_html($genre_term->name) . '</a>';
                }
                ?>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
      <?php
      $current_term = get_queried_object();
      $args = array(
        'post_type'      => 'works',
        'posts_per_page' => 9,
        'orderby'        => 'date',
        'order'          => 'DESC',
      );
      $query = new WP_Query($args);
      ?>
      <?php if ($query->have_posts()) : ?>
        <ul class="p-works__cards">
          <?php
          while ($query->have_posts()) : $query->the_post(); ?>
            <li class="p-works__card">
              <a href="<?php the_permalink(); ?>" class="p-works__card-link">
                <figure class="p-works__img">
                  <img src="<?php the_field('img'); ?>" alt="">
                  <p class="p-works__detail">詳細を見る</p>
                </figure>
                <div class="p-works__body">
                  <h2 class="p-works__title"><?php the_title(); ?></h2>
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
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>