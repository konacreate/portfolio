<?php
$categories = get_categories(array(
  'orderby' => 'name',
  'order' => 'ASC',
  'hide_empty' => true,
));

$tags = get_tags(array(
  'orderby' => 'name',
  'order' => 'ASC',
  'hide_empty' => true,
));

global $wpdb;
$archives = $wpdb->get_results(
  $wpdb->prepare(
    "SELECT YEAR(post_date) AS year, MONTH(post_date) AS month
     FROM {$wpdb->posts}
     WHERE post_type = %s AND post_status = 'publish'
     GROUP BY YEAR(post_date), MONTH(post_date)
     ORDER BY post_date DESC
     LIMIT %d",
    'post',
    12
  )
);
?>

<aside class="p-widget">
  <?php if (!empty($categories)) : ?>
    <div class="p-widget__category">
      <h2 class="p-widget__title">カテゴリ</h2>
      <ul class="p-widget__list">
        <?php foreach ($categories as $category) : ?>
          <?php
          $is_current = is_category($category->term_id);
          $link_class = 'p-widget__link' . ($is_current ? ' is-current' : '');
          ?>
          <li class="p-widget__item">
            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="<?php echo esc_attr($link_class); ?>">
              <?php echo esc_html($category->name); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if (!empty($tags)) : ?>
    <div class="p-widget__tag">
      <h2 class="p-widget__title">タグ</h2>
      <div class="p-widget__tags">
        <?php foreach ($tags as $tag) : ?>
          <?php
          $is_current = is_tag($tag->term_id);
          $link_class = 'p-widget__tag-link' . ($is_current ? ' is-current' : '');
          ?>
          <a href="<?php echo esc_url(get_tag_link($tag)); ?>" class="<?php echo esc_attr($link_class); ?>">
            #<?php echo esc_html($tag->name); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if (!empty($archives)) : ?>
    <div class="p-widget__archive">
      <h2 class="p-widget__title">アーカイブ</h2>
      <ul class="p-widget__list">
        <?php foreach ($archives as $archive) : ?>
          <?php
          $year = (int) $archive->year;
          $month = (int) $archive->month;
          $is_current = is_month() && (int) get_query_var('year') === $year && (int) get_query_var('monthnum') === $month;
          $link_class = 'p-widget__link' . ($is_current ? ' is-current' : '');
          $label = wp_date('Y年n月', strtotime(sprintf('%04d-%02d-01', $year, $month)));
          ?>
          <li class="p-widget__item">
            <a href="<?php echo esc_url(get_month_link($year, $month)); ?>" class="<?php echo esc_attr($link_class); ?>">
              <?php echo esc_html($label); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
</aside>
