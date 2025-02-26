<?php
function my_setup() {
  add_theme_support('post-thumbnails'); //アイキャッチ
  add_theme_support('automatic-feed-links'); //RSSフィード
  add_theme_support('title-tag'); //タイトルタグ自動生成
  add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' )); //HTML5のタグで出力
}
add_action("after_setup_theme", "my_setup");

function my_script_init() {
  wp_enqueue_style('googlefonts', "https://fonts.googleapis.com/css2?family=M+PLUS+1p&family=Noto+Sans+JP:wght@100..900&family=Zen+Kaku+Gothic+New&display=swap", array(), null );
  wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0', "all" );
  wp_enqueue_style("my", get_template_directory_uri() . "/assets/css/style.css", array(), filemtime(get_theme_file_path('assets/css/style.css')), "all");
  wp_enqueue_script("gsap", "https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js", array(), '3.12.5', true);
  wp_enqueue_script("scrolltrigger", "https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js", array(), '3.12.5', true);
  wp_enqueue_script("swiper", "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js", array(), '11.0.0', true);
  wp_enqueue_script("my", get_template_directory_uri() . "/assets/js/main.js", array("jquery"), filemtime(get_theme_file_path('assets/js/main.js')), true);
}
add_action("wp_enqueue_scripts", "my_script_init");

