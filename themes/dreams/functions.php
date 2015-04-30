<?php 

define("THEME_THEMENAME", 'DREAMS EVENTOS');

define("THEME_LIB_URL", get_template_directory_uri(). '/lib/');
define('THEME_FRAMEWORK', get_template_directory() . '/lib/');
define("THEME_ADMIN", THEME_FRAMEWORK . '/admin');
define("THEME_IMAGES_URL", get_template_directory_uri(). '/lib/images/');
define("THEME_FUNCTIONS_PATH", TEMPLATEPATH . '/lib/functions/');
define("THEME_CSS_URL", get_template_directory_uri() . '/lib/css/');
define("THEME_SCRIPT_URL", get_template_directory_uri() . '/lib/js/');
define("THEME_UTILS_URL", get_template_directory_uri() . '/lib/utils/');
define("THEME_TIMTHUMB_URL", THEME_UTILS_URL . 'timthumb.php');

$uploadsdir=wp_upload_dir();
define("THEME_UPLOADS_URL", $uploadsdir['url']);

if(is_admin()){

	add_action('admin_enqueue_scripts', 'theme_admin_init');
	add_action('admin_head', 'theme_admin_head_add');

	/**
	 * Enqueues the JavaScript files needed depending on the current section.
	 */
	function theme_admin_init(){

		//enqueue the script and CSS files for the TinyMCE editor formatting buttons and Upload functionality
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-dialog');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('theme-page-options',THEME_SCRIPT_URL.'page-options.js');
		wp_enqueue_script('theme-metaboxes-options',THEME_SCRIPT_URL.'metaboxes_scripts.js');
		wp_enqueue_script('theme-myupload-options',THEME_SCRIPT_URL.'my_upload.js');
		wp_enqueue_script('theme-options',THEME_SCRIPT_URL.'options.js');
		
		

		//set the style files
		wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
  		wp_enqueue_style( 'jquery-ui' );   
		add_editor_style('lib/formatting-buttons/custom-editor-style.css');
		wp_enqueue_style('theme-page-style',THEME_CSS_URL.'page_style.css');
		wp_enqueue_style('theme-metaboxes-style',THEME_CSS_URL.'metaboxes_styles.css');

	}

	/**
	 * Inserts scripts for initializing the JavaScript functionality for the relevant section.
	 */
	function theme_admin_head_add(){
		
		//create JavaScript variables that will be accessible globally from all scripts
		echo '<script type="text/javascript">
		pexetoUploadHandlerUrl="'.THEME_UTILS_URL.'upload-handler.php",
		pexetoUploadsUrl="'.THEME_UPLOADS_URL.'";
		</script>';
	}

}

//------ THEME OPTIONS PANEL ------//
require_once('theme-options/options-init.php');

require_once (THEME_FUNCTIONS_PATH.'meta.php');  // adds the custom meta fields to the posts and pages
require_once (THEME_FUNCTIONS_PATH.'ajax.php');  // add custom ajax functions
require_once (THEME_FUNCTIONS_PATH.'type-slideshow.php');
require_once (THEME_FUNCTIONS_PATH.'type-events.php');
require_once (THEME_FUNCTIONS_PATH.'type-services.php');

function wplatzi_init(){
	// Activate post thumbnails with two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1000, 212, true );
	add_image_size( 'dreams-full-width', 1024, 500, true );
	add_image_size( 'dreams-facebook', 1200, 627, true );
	add_image_size( 'dreams-thumbnail', 424, 280, true );
	add_image_size( 'dreams-fancybox', 720, 480, true );

	// Menu locations, use with wp_nav_menu()
	register_nav_menus( array(
		'top_menu'    => 'Top menu',
		'footer_menu' => 'Footer menu'
	) );
}
add_action( 'after_setup_theme', 'wplatzi_init' );

function wplatzi_scripts(){
	// Load CSS to front-end
	wp_enqueue_style( 'dreams-style', get_stylesheet_uri() );
	wp_enqueue_style( 'dreams-css-normalize', get_template_directory_uri() . '/css/normalize.css', array( 'dreams-style' ) );
	wp_enqueue_style( 'dreams-css-foundation', get_template_directory_uri() . '/css/foundation.css', array( 'dreams-style' ) );
	wp_enqueue_style( 'dreams-css-base', get_template_directory_uri() . '/css/master.css', array( 'dreams-style' ) );

	// Load JS to front-end
	wp_enqueue_script( 'dreams-js-base', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ) );
	wp_enqueue_script( 'dreams-js-carouFredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1.js', array( 'jquery' ) );
	wp_enqueue_script( 'dreams-call-ajax', get_template_directory_uri() . '/js/ajax.js', array( 'jquery' ) );
	wp_localize_script( 'dreams-call-ajax', 'apfajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'wplatzi_scripts' );

/**
 * Change the markup of wp_title().
 */
function dreams_wp_title( $title, $sep ) {
	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	return $title;
}
add_action( 'wp_title', 'dreams_wp_title', 10, 2 );

