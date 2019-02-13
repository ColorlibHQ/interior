<?php

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'INTERIOR_COMPANION_VERSION' ) ) {
    define( 'INTERIOR_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'INTERIOR_COMPANION_DIR_PATH' ) ) {
    define( 'INTERIOR_COMPANION_DIR_PATH', INTERIOR_DIR_PATH_COMPANION );
}

// Define inc dir path constant
if( ! defined( 'INTERIOR_COMPANION_INC_DIR_PATH' ) ) {
    define( 'INTERIOR_COMPANION_INC_DIR_PATH', INTERIOR_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'INTERIOR_COMPANION_SW_DIR_PATH' ) ) {
    define( 'INTERIOR_COMPANION_SW_DIR_PATH', INTERIOR_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'INTERIOR_COMPANION_EW_DIR_PATH' ) ) {
    define( 'INTERIOR_COMPANION_EW_DIR_PATH', INTERIOR_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'INTERIOR_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'INTERIOR_COMPANION_DEMO_DIR_PATH', INTERIOR_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define companion dir url constant
if( ! defined( 'INTERIOR_COMPANION_DIR_URL' ) ) {
    define( 'INTERIOR_COMPANION_DIR_URL', INTERIOR_DIR_URI . 'inc/interior-companion/' );
}

// Define companion dir url constant
if( ! defined( 'INTERIOR_COMPANION_EL_WIDGETS_DIR_URL' ) ) {
    define( 'INTERIOR_COMPANION_EL_WIDGETS_DIR_URL', INTERIOR_DIR_URI . 'inc/interior-companion/inc/elementor-widgets/' );
}

require_once INTERIOR_COMPANION_DIR_PATH . 'interior-init.php';
