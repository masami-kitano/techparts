<?php

// ツールバーの削除
add_filter('show_admin_bar', '__return_false');

$tmp_path_arr = array(
	'temp_uri' => get_template_directory_uri()
);

wp_enqueue_script( 'main', get_template_directory_uri() . 'assets/js/tp.js', '', '1.0', true );
wp_localize_script( 'main', 'tmp_path', $tmp_path_arr );

function tp_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support( 'html5', array( /* HTML5のタグで出力 */
	  'search-form',
	  'comment-form',
	  'comment-list',
	  'gallery',
	  'caption',
	) );
  }
  add_action( 'after_setup_theme', 'tp_setup' );

function tp_menu_init() {
register_nav_menus( array(
	'global'  => 'グローバルメニュー',
	'utility' => 'ユーティリティメニュー',
	'drawer'  => 'ドロワーメニュー',
) );
}
add_action( 'init', 'tp_menu_init' );

// css js
function tp_enqueue_scripts() {
	// css
	wp_enqueue_style( 
		'reset-style', 
		get_template_directory_uri() . '/assets/css/reset.css', 
		array(), '1.0.0', 'all' 
	);

	wp_enqueue_style( 
		'tp-style', 
		get_template_directory_uri() . '/assets/css/tp.css', 
		array(), '1.0.0', 'all' 
	);

	wp_enqueue_style( 
		'main-style', 
		get_template_directory_uri() . '/style.css', 
		array(), '1.0.0', 'all' 
	);

	wp_enqueue_style(
		'fontawesome',
		'https://use.fontawesome.com/releases/v5.8.2/css/all.css'
	);
	

	// js
	wp_enqueue_script( 
		'common-script', 
		get_template_directory_uri() . '/assets/js/tp.js',
		array('jquery'),
		false,
		true
	);

	/* ---------- JS分割用 ---------- */
	
	// if( is_front_page() ) wp_enqueue_script( 
	// 	'home-script', 
	// 	get_template_directory_uri() . '/assets/js/.js',
	// 	array( 'jquery' ),
	// 	false,
	//   	true
	// );

	// if ( is_page( 'menu' ) ) wp_enqueue_script( 
	// 'menu-script', 
	// get_template_directory_uri() . '/assets/js/.js',
	// array( 'jquery' ),
	// false,
	// true
	// );

  }
  add_action( 'wp_enqueue_scripts', 'tp_enqueue_scripts' );


// Sidebar
function tp_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'tp Sidebar', 'tp' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'techparts' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);	
}
add_action( 'widgets_init', 'tp_widgets_init' );

// 抜粋記事の文字数制限指定
function custom_excerpt_length( $length ) {
	return 80;	
}	
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// トップページのTopics覧の投稿を任意で取得
function topics_posts() {
	$args = array(
		'post_type' => 'post', 
		'post__in' => array(1, 5, 7, 15, 17),
	); 
	return $args;
}

// カテゴリー・タグ・アーカイブ・検索結果かどうかの判定処理
function current_archive() {
	if (is_category()) {
		echo "Category";
	}
	elseif (is_tag()){
		echo "Tag";
	}
	elseif (is_post_type_archive()){
		echo "Archive";
	}
	elseif (is_date()){
		$date = get_the_time('Y年n月');
		echo $date;
	}
	elseif (is_search()){
		echo "検索結果";
	}
	elseif (s_404()){
		echo "「404」ページが見つかりません";
	}
}

// the_archive_title 余計な文字を削除 
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
	    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
	    $title = get_the_time('Y年n月');
	} elseif (is_search()) {
	    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
	    $title = '「404」ページが見つかりません';
	} else {

	}
    return $title;
});

// カテゴリーのslugを取得
function get_category_slug() {
	$category = get_the_category();
	$slug = $category[0]->category_nicename;  

	return $slug;
}

// お問い合わせフォーム　Line通知
if ( ! function_exists( 'my_send_linenotify' ) ) {
    function my_send_linenotify( $message, $image_thumbnail = '', $image_fullsize = '' ) {
        $url = 'https://notify-api.line.me/api/notify';
        $token = 'DeEmqMZS1Y7YcUKuplNl1BBfVswhiAsrav4lEk01IhG';
        $response = wp_remote_post( $url, array(
            'method' => 'POST',
            'headers' => array(
                'Authorization' => 'Bearer '.$token,
            ),
            'body' => array(
                'message' => $message,
                'imageThumbnail' => $image_thumbnail,
                'imageFullsize' => $image_fullsize,
            ),
        ));
        if ( is_wp_error( $response ) ) {
            $error_message = $response->get_error_message();
            echo "Error: $error_message";
        }
    }
}

// Line通知連携
function my_wpcf7_mail_sent( $contact_form ) {
    $message = "お問い合わせフォームが送信されました。\n";
    $message .= "タイトル：" . $contact_form->title;
    my_send_linenotify( $message );
}
add_action( 'wpcf7_mail_sent', 'my_wpcf7_mail_sent', 10, 1 );

// 画像 width/height 自動割り当て機能削除
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
 
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}