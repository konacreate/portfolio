<?php get_header(); ?>

<?php if (function_exists('bcn_display')) : ?>
  <!-- breadcrumb -->
  <div class="p-breadcrumb">
    <div class="p-breadcrumb__inner">
      <?php bcn_display(); ?>
    </div>
  </div><!-- /p-breadcrumb -->
<?php endif; ?>

<main class="l-main">
  <div class="l-low__entry p-entry">
    <div class="l-inner p-entry__inner">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="p-entry__body">
            <article class="p-entry__article">
              <h1 class="c-heading p-entry__heading"><?php the_title(); ?></h1>
              <div class="p-entry__meta">
                <time class="p-entry__article-date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time>
                <?php if (has_category()) : ?>
                  <div class="p-entry__categories">
                    <?php the_category(' '); ?>
                  </div>
                <?php endif; ?>
                <?php
                $entry_tags = get_the_tags();
                if ($entry_tags) :
                  ?>
                  <div class="p-entry__tags">
                    <?php foreach ($entry_tags as $tag) : ?>
                      <a href="<?php echo esc_url(get_tag_link($tag)); ?>" class="p-entry__tag-link">
                        #<?php echo esc_html($tag->name); ?>
                      </a>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </div>
              <figure class="p-entry__article-img">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('my_thumbnail');
                } else {
                  echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/noimg.webp" alt="画像なし">';
                }
                ?>
              </figure>
              <div class="p-entry__article-content">
                <?php the_content(); ?>
                <?php
                wp_link_pages(array(
                  'before' => '<nav class="p-entry__pager" aria-label="ページ"><ul class="p-entry__pager-list">',
                  'after' => '</ul></nav>',
                  'link_before' => '<li><span class="p-entry__pager-link">',
                  'link_after' => '</span></li>',
                ));
                ?>
              </div>
            </article>
            <div class="p-entry__share">
              <?php
              $share_url = rawurlencode(get_permalink());
              $share_text = rawurlencode(get_the_title());
              $share_link = 'https://twitter.com/intent/tweet?url=' . $share_url . '&text=' . $share_text;
              ?>
              <a
                href="<?php echo esc_url($share_link); ?>"
                class="p-entry__share-link"
                target="_blank"
                rel="noopener noreferrer"
              >Xでシェア</a>
            </div>

            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            if ($prev_post || $next_post) :
              $pagination_class = 'p-pagination';
              if ($prev_post && $next_post) {
                $pagination_class .= ' p-pagination--between';
              } elseif ($prev_post) {
                $pagination_class .= ' p-pagination--prev-only';
              } else {
                $pagination_class .= ' p-pagination--next-only';
              }
            ?>
              <nav class="<?php echo esc_attr($pagination_class); ?>" aria-label="記事ナビゲーション">
                <ul class="page-numbers">
                  <?php if ($prev_post) : ?>
                    <li>
                      <a class="prev page-numbers" href="<?php echo esc_url(get_permalink($prev_post)); ?>">
                        <span class="p-pagination__prev">前へ</span>
                      </a>
                    </li>
                  <?php endif; ?>
                  <?php if ($next_post) : ?>
                    <li>
                      <a class="next page-numbers" href="<?php echo esc_url(get_permalink($next_post)); ?>">
                        <span class="p-pagination__next">次へ</span>
                      </a>
                    </li>
                  <?php endif; ?>
                </ul>
              </nav>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      <?php else : ?>
        <div class="p-entry__body">
          <h1 class="c-heading p-entry__heading">記事がありません</h1>
          <p class="p-entry__article-text">記事がありません</p>
        </div>
      <?php endif; ?>

      <?php get_sidebar(); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>