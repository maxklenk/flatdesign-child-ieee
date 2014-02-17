<?php

if (defined('ICL_LANGUAGE_CODE')) {
	define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
	define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
	define('ICL_DONT_LOAD_LANGUAGES_JS', true);


	function lang_switch_link() {
		$arr = icl_get_languages();
		$cur = ICL_LANGUAGE_CODE;

		if ($cur == "de" && array_key_exists('en', $arr)) {
		  $url = $arr["en"]["url"];
		} elseif (array_key_exists('de', $arr)) {
		  $url = $arr["de"]["url"];
		} else {
		  $url = "#";
		}

		?>
		<a class="lang-link" href="<?php echo $url ?>" title="<?php _e('View translated page', 'bonestheme') ?>"></a>
		<?php
	}

} else {
	function lang_switch_link() {}
}

function ieee_login_css() {
    wp_dequeue_style( bones_login_css );
    wp_enqueue_style( 'ieee_login_css', get_stylesheet_directory_uri() . '/library/css/login.css', false );
}

add_action( 'login_enqueue_scripts', 'ieee_login_css', 15 );

// Show posts of 'post', 'page' and 'movie' post types on home page
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'event', 'post') );
	return $query;
}

?>