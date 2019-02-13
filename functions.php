<?php 
/**
 * @Packge 	   : Interior
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
 *
 * Define constant
 *
 */
 
// Base URI
if( ! defined( 'INTERIOR_DIR_URI' ) ) {
	define( 'INTERIOR_DIR_URI', get_template_directory_uri().'/' );
}

// assets URI
if( ! defined( 'INTERIOR_DIR_ASSETS_URI' ) ) {
	define( 'INTERIOR_DIR_ASSETS_URI', INTERIOR_DIR_URI.'assets/' );
}

// Css File URI
if( ! defined( 'INTERIOR_DIR_CSS_URI' ) ) {
	define( 'INTERIOR_DIR_CSS_URI', INTERIOR_DIR_ASSETS_URI .'css/' );
}

// Js File URI
if( ! defined( 'INTERIOR_DIR_JS_URI' ) ) {
	define( 'INTERIOR_DIR_JS_URI', INTERIOR_DIR_ASSETS_URI .'js/' );
}

// Base Directory
if( ! defined( 'INTERIOR_DIR_PATH' ) ) {
	define( 'INTERIOR_DIR_PATH', get_parent_theme_file_path().'/' );
}

//Inc Folder Directory
if( ! defined( 'INTERIOR_DIR_PATH_INC' ) ) {
	define( 'INTERIOR_DIR_PATH_INC', INTERIOR_DIR_PATH.'inc/' );
}

//Interior libraries Folder Directory
if( ! defined( 'INTERIOR_DIR_PATH_LIBS' ) ) {
	define( 'INTERIOR_DIR_PATH_LIBS', INTERIOR_DIR_PATH_INC.'libraries/' );
}

//Classes Folder Directory
if( ! defined( 'INTERIOR_DIR_PATH_CLASSES' ) ) {
	define( 'INTERIOR_DIR_PATH_CLASSES', INTERIOR_DIR_PATH_INC.'classes/' );
}

//Hooks Folder Directory
if( ! defined( 'INTERIOR_DIR_PATH_HOOKS' ) ) {
	define( 'INTERIOR_DIR_PATH_HOOKS', INTERIOR_DIR_PATH_INC.'hooks/' );
}

//Companion Folder Directory
if( ! defined( 'INTERIOR_DIR_PATH_COMPANION' ) ) {
	define( 'INTERIOR_DIR_PATH_COMPANION', INTERIOR_DIR_PATH_INC.'interior-companion/' );
}




/**
 * Include File
 *
 */

require_once( INTERIOR_DIR_PATH_INC . 'breadcrumbs.php' );
require_once( INTERIOR_DIR_PATH_INC . 'widgets-reg.php' );
require_once( INTERIOR_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
require_once( INTERIOR_DIR_PATH_INC . 'interior-functions.php' );
require_once( INTERIOR_DIR_PATH_INC . 'commoncss.php' );
require_once( INTERIOR_DIR_PATH_INC . 'support-functions.php' );
require_once( INTERIOR_DIR_PATH_INC . 'category-meta.php' );
require_once( INTERIOR_DIR_PATH_INC . 'wp-html-helper.php' );
require_once( INTERIOR_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
require_once( INTERIOR_DIR_PATH_INC . 'customizer/customizer.php' );
require_once( INTERIOR_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
require_once( INTERIOR_DIR_PATH_CLASSES . 'Class-Config.php' );
require_once( INTERIOR_DIR_PATH_HOOKS . 'hooks.php' );
require_once( INTERIOR_DIR_PATH_HOOKS . 'hooks-functions.php' );
require_once( INTERIOR_DIR_PATH_COMPANION . 'interior-companion.php' );
require_once( INTERIOR_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
require_once( INTERIOR_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


/**
 * Instantiate Interior object
 *
 * Inside this object:
 * Enqueue scripts, Google font, Theme support features, Epsilon Dashboard .
 *
 */

$obj = new Interior();
