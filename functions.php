<?php
function my_setup() {
  add_theme_support('post-thumbnails'); //アイキャッチ
  add_theme_support('automatic-feed-links'); //RSSフィード
  add_theme_support('title-tag'); //タイトルタグ自動生成
  add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' )); //HTML5のタグで出力
}
add_action("after_setup_theme", "my_setup");

function my_script_init() {
  wp_enqueue_style('googlefonts', "https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;500;700;800&family=Zen+Kaku+Gothic+New:wght@400;500;700&display=swap", array(), null );
  wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0', "all" );
  wp_enqueue_style("my", get_template_directory_uri() . "/assets/css/style.css", array(), filemtime(get_theme_file_path('assets/css/style.css')), "all");
  wp_enqueue_script("gsap", "https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js", array(), '3.15.0', true);
  wp_enqueue_script("split-text", "https://cdn.jsdelivr.net/npm/gsap@3.15/dist/SplitText.min.js", array('gsap'), '3.15.0', true);
  wp_enqueue_script("scrolltrigger", "https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollTrigger.min.js", array('gsap'), '3.15.0', true);
  wp_enqueue_script('split-type', 'https://cdn.jsdelivr.net/npm/split-type@0.3.4/umd/index.min.js', array(), null, true);
  wp_enqueue_script("swiper", "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js", array(), '11.0.0', true);
  wp_enqueue_script("my", get_template_directory_uri() . "/assets/js/main.js", array('gsap', 'split-text', 'split-type', 'scrolltrigger', 'swiper'), filemtime(get_theme_file_path('assets/js/main.js')), true);
}
add_action("wp_enqueue_scripts", "my_script_init");

add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
    return false;
}

/**
 * アーカイブタイトル書き換え
 */
function my_archive_title($title)
{

  if (is_category()) { // カテゴリーアーカイブの場合
    $title = single_cat_title('', false);
  } elseif (is_tag()) { // タグアーカイブの場合
    $title = single_tag_title('', false);
  } elseif (is_post_type_archive()) { // 投稿タイプのアーカイブの場合
    $title = post_type_archive_title('', false);
  } elseif (is_tax()) { // タームアーカイブの場合
    $title = single_term_title('', false);
  } elseif (is_author()) { // 作者アーカイブの場合
    $title = get_the_author();
  } elseif (is_date()) { // 日付アーカイブの場合
    $title = '';
    if (get_query_var('year')) {
      $title .= get_query_var('year') . '年';
    }
    if (get_query_var('monthnum')) {
      $title .= get_query_var('monthnum') . '月';
    }
    if (get_query_var('day')) {
      $title .= get_query_var('day') . '日';
    }
  }
  return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');

// お問い合わせサンクスnoindex
function my_noindex_on_contact_thanks()
{
  if (is_page_template('page-contact-thanks.php')) {
    echo '<meta name="robots" content="noindex, follow">' . "\n";
  }
}
add_action('wp_head', 'my_noindex_on_contact_thanks', 1);

function my_output_structured_data()
{
  if (is_admin()) {
    return;
  }

  $graph = [];

  // 全ページ共通: WebSite
  $graph[] = [
    '@type' => 'WebSite',
    '@id'   => home_url('/#website'),
    'url'   => home_url('/'),
    'name'  => get_bloginfo('name'),
    'inLanguage' => 'ja',
  ];

  if (is_front_page()) {
    $graph[] = [
      '@type' => 'Person',
      '@id'   => home_url('/#person'),
      'name'  => 'しらいしかな',
      'url'   => home_url('/'),
      'jobTitle' => 'Webコーダー',
    ];
  } elseif (is_singular('post')) {
    // ブログ記事
    $graph[] = [
      '@type' => 'BlogPosting',
      'headline' => get_the_title(),
      'datePublished' => get_the_date('c'),
      'dateModified' => get_the_modified_date('c'),
      'author' => [
        '@type' => 'Person',
        'name' => 'しらいしかな',
      ],
      'image' => get_the_post_thumbnail_url(null, 'full'),
      'mainEntityOfPage' => get_permalink(),
    ];
  } elseif (is_singular('works')) {
    // 制作実績
    $graph[] = [
      '@type' => 'CreativeWork',
      'name' => get_the_title(),
      'url' => get_permalink(),
      'image' => get_the_post_thumbnail_url(null, 'full'),
      'datePublished' => get_the_date('c'),
    ];
  }

  if (empty($graph)) {
    return;
  }

  $schema = [
    '@context' => 'https://schema.org',
    '@graph' => $graph,
  ];

  echo '<script type="application/ld+json">';
  echo wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
  echo '</script>' . "\n";
}
add_action('wp_head', 'my_output_structured_data', 20);