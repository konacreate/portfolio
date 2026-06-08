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
  <div class="l-low__blog p-blog">
    <div class="l-inner p-blog__inner">
      <h1 class="c-heading --archive p-blog__heading"><?php echo esc_html(get_the_archive_title()); ?></h1>
      <div class="p-blog__articles">
        <?php if (get_the_archive_description()) : ?>
          <div class="p-blog__description"><?php echo wp_kses_post(get_the_archive_description()); ?></div>
        <?php endif; ?>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="p-blog__article-link">
              <article class="p-blog__article">
                <figure class="p-blog__article-img">
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail('my_thumbnail');
                  } else {
                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/noimg.webp" alt="画像なし">';
                  }
                  ?>
                </figure>
                <div class="p-blog__article-body">
                  <h2 class="p-blog__article-title"><?php the_title(); ?></h2>
                  <time class="p-blog__article-date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time>
                  <div class="p-blog__article-content"><?php the_excerpt(); ?></div>
                </div>
              </article>
            </a>
          <?php endwhile; ?>
        <?php else : ?>
          <p class="p-blog__article-text">記事がありません</p>
        <?php endif; ?>

        <?php if (paginate_links()) : ?>
          <div class="p-pagination">
            <?php
            echo paginate_links(array(
              'end_size' => 1,
              'mid_size' => 1,
              'prev_next' => true,
              'prev_text' => '<span class="p-pagination__prev">前へ</span>',
              'next_text' => '<span class="p-pagination__next">次へ</span>',
              'type' => 'list',
            ));
            ?>
          </div>
        <?php endif; ?>
      </div>

      <?php get_sidebar(); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
