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
?>