<?php
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge     : Interior Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */


// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'Interior_El_Widgets' ) ) {
    /**
     * Main Interior Elementor Widgets Class
     *
     *
     * @since 1.7.0
     */
    final class Interior_El_Widgets {
        /**
         * Interior Companion Core Version
         *
         * Holds the version of the plugin.
         *
         * @since 1.7.0
         * @since 1.7.1 Moved from property with that name to a constant.
         *
         * @var string The plugin version.
         */
        const  VERSION = '1.0' ;
        /**
         * Minimum Elementor Version
         *
         * Holds the minimum Elementor version required to run the plugin.
         *
         * @since 1.7.0
         * @since 1.7.1 Moved from property with that name to a constant.
         *
         * @var string Minimum Elementor version required to run the plugin.
         */
        const  MINIMUM_ELEMENTOR_VERSION = '1.7.0';
        /**
         * Minimum PHP Version
         *
         * Holds the minimum PHP version required to run the plugin.
         *
         * @since 1.7.0
         * @since 1.7.1 Moved from property with that name to a constant.
         *
         * @var string Minimum PHP version required to run the plugin.
         */
        const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Instance
         *
         * Holds a single instance of the `Press_Elements` class.
         *
         * @since 1.7.0
         *
         * @access private
         * @static
         *
         * @var Press_Elements A single instance of the class.
         */
        private static  $_instance = null ;

        /**
         * Instance
         *
         * Ensures only one instance of the class is loaded or can be loaded.
         *
         * @since 1.7.0
         *
         * @access public
         * @static
         *
         * @return Press_Elements An instance of the class.
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * Clone
         *
         * Disable class cloning.
         *
         * @since 1.7.0
         *
         * @access protected
         *
         * @return void
         */
        public function __clone() {
            // Cloning instances of the class is forbidden
            _doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'interior-companion' ), '1.7.0' );
        }

        /**
         * Wakeup
         *
         * Disable unserializing the class.
         *
         * @since 1.7.0
         *
         * @access protected
         *
         * @return void
         */
        public function __wakeup() {
            // Unserializing instances of the class is forbidden.
            _doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'interior-companion' ), '1.7.0' );
        }

        /**
         * Constructor
         *
         * Initialize the interior elementor widgets.
         *
         * @since 1.7.0
         *
         * @access public
         */
        public function __construct() {
           
            $this->init_hooks();
            do_action( 'press_elements_loaded' );
        }


        /**
         * Init Hooks
         *
         * Hook into actions and filters.
         *
         * @since 1.7.0
         *
         * @access private
         */
        private function init_hooks() {
            add_action( 'init', [ $this, 'init' ] );
        }


        /**
         * Init Interior Elementor Widget
         *
         * Load the plugin after Elementor (and other plugins) are loaded.
         *
         * @since 1.0.0
         * @since 1.7.0 The logic moved from a standalone function to this class method.
         *
         * @access public
         */
        public function init() {

            if ( !did_action( 'elementor/loaded' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
                return;
            }

            // Check for required Elementor version

            if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
                return;
            }

            // Check for required PHP version

            if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
                return;
            }

            // Add new Elementor Categories
            add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_category' ] );
            add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_widget_styles' ] );
            add_action( 'elementor/frontend/after_register_styles', [ $this, 'register_widget_styles' ] );
            add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_styles' ] );

            // Register New Widgets
            add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );

            // Interior Companion enqueue style and scripts
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_element_widgets_scripts' ] );

        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have Elementor installed or activated.
         *
         * @since 1.1.0
         * @since 1.7.0 Moved from a standalone function to a class method.
         *
         * @access public
         */
        public function admin_notice_missing_main_plugin() {
            $message = sprintf(
            /* translators: 1: Elementor */
                esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'interior-companion' ),
                '<strong>' . esc_html__( 'Interior Theme', 'interior-companion' ) . '</strong>',
                '<strong>' . esc_html__( 'Elementor', 'interior-companion' ) . '</strong>'
            );
            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have a minimum required Elementor version.
         *
         * @since 1.1.0
         * @since 1.7.0 Moved from a standalone function to a class method.
         *
         * @access public
         */
        public function admin_notice_minimum_elementor_version() {
            $message = sprintf(
            /* translators: 1: Elementor 2: Required Elementor version */
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'interior-companion' ),
                '<strong>' . esc_html__( 'Interior', 'interior-companion' ) . '</strong>',
                '<strong>' . esc_html__( 'Elementor', 'interior-companion' ) . '</strong>',
                self::MINIMUM_ELEMENTOR_VERSION
            );
            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have a minimum required PHP version.
         *
         * @access public
         */
        public function admin_notice_minimum_php_version() {
            $message = sprintf(
            /* translators: 1: PHP 2: Required PHP version */
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'interior-companion' ),
                '<strong>' . esc_html__( 'Interior', 'interior-companion' ) . '</strong>',
                '<strong>' . esc_html__( 'PHP', 'interior-companion' ) . '</strong>',
                self::MINIMUM_PHP_VERSION
            );
            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
        }

        /**
         * Add new Elementor Categories
         *
         * Register new widget categories for Interior widgets.
         *
         * @access public
         */
        public function add_elementor_category() {

            \Elementor\Plugin::instance()->elements_manager->add_category( 'interior-elements', [
                'title' => __( 'Interior Elements', 'interior-companion' ),
            ], 1 );

        }

        /**
         * Enqueue Widgets Scripts
         *
         * Enqueue custom scripts required to run interior elementor widgets.
         *
         * @access public
         */
        public function enqueue_element_widgets_scripts() {

            // googlr map api key
            $apiKey  = interior_opt('interior_map_apikey');


            /******************
                Enqueue Css
            ******************/
            wp_enqueue_style( 'owl-carousel', INTERIOR_COMPANION_EL_WIDGETS_DIR_URL . 'assets/css/owl.carousel.css',  array(), '2.2.0', 'all' );
            wp_enqueue_style( 'magnific-popup', INTERIOR_COMPANION_EL_WIDGETS_DIR_URL . 'assets/css/magnific-popup.css', array(), '3.7.0', 'all' );


            /*****************
                Enqueue Js
            ******************/

            // googleapis js
            wp_register_script( 'maps-googleapis', '//maps.googleapis.com/maps/api/js?key='.esc_attr( $apiKey ) );

            // ajaxchimp js
            wp_enqueue_script( 'jquery-ajaxchimp', INTERIOR_COMPANION_EL_WIDGETS_DIR_URL . 'assets/js/jquery.ajaxchimp.min.js', array('jquery'), '1.0', true );

            // jquery owl carousel
            wp_enqueue_script( 'owl-carousel', INTERIOR_COMPANION_EL_WIDGETS_DIR_URL .'assets/js/owl.carousel.min.js', array('jquery'), '2.2.0', true );

            // jquery waypoints js
            wp_enqueue_script( 'jquery-magnific-popup', INTERIOR_COMPANION_EL_WIDGETS_DIR_URL . 'assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.0', true );

            // jquery accordion js
           wp_enqueue_script( 'mm-accordion', INTERIOR_COMPANION_EL_WIDGETS_DIR_URL . 'assets/js/mn-accordion.js', array('jquery'), '1.0', true );
           
            // jquery waypoints js
           wp_enqueue_script( 'waypoints', INTERIOR_COMPANION_EL_WIDGETS_DIR_URL . 'assets/js/waypoints.min.js', array('jquery'), '1.0', true );

            // jquery counterup js
           wp_enqueue_script( 'jquery-counterup', INTERIOR_COMPANION_EL_WIDGETS_DIR_URL . 'assets/js/jquery.counterup.min.js', array('jquery'), '1.0', true );

            // interior map custom js
            wp_register_script( 'interior-map-custom', INTERIOR_COMPANION_EL_WIDGETS_DIR_URL . 'assets/js/map-custom.js',  array('jquery'), '1.0', true );

            // interior companion main js
            wp_enqueue_script( 'interior-companion', INTERIOR_COMPANION_EL_WIDGETS_DIR_URL . 'assets/js/interior-companion-main.js', array( 'jquery', 'jquery-ui-datepicker' ), '1.0', true );


            wp_localize_script( 'interior-companion', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );
           
        }

        /**
         * Register Widget Styles
         *
         * Register custom styles required to run Interior.
         *
         * @access public
         */
        public function register_widget_styles() {
            // Typing Effect
            wp_enqueue_style( 'interior-companion-elementor-edit', INTERIOR_COMPANION_EL_WIDGETS_DIR_URL . 'assets/css/elementor-edit.css' );
        }


        /**
         * Register New Widgets
         *
         * Include Interior Companion widgets files and register them in Elementor.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access public
         */
        public function on_widgets_registered() {
            $this->include_widgets();
            $this->register_widgets();
        }

        /**
         * Include Widgets Files
         *
         * Load interior companion widgets files.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access private
         */
        private function include_widgets() {
            
            require_once INTERIOR_COMPANION_EW_DIR_PATH . 'widgets/banner.php';
            require_once INTERIOR_COMPANION_EW_DIR_PATH . 'widgets/section-heading.php';
            require_once INTERIOR_COMPANION_EW_DIR_PATH . 'widgets/about.php';
            require_once INTERIOR_COMPANION_EW_DIR_PATH . 'widgets/contact.php';
            require_once INTERIOR_COMPANION_EW_DIR_PATH . 'widgets/features.php';
            require_once INTERIOR_COMPANION_EW_DIR_PATH . 'widgets/call-to-action.php';
            require_once INTERIOR_COMPANION_EW_DIR_PATH . 'widgets/testimonial.php';
            require_once INTERIOR_COMPANION_EW_DIR_PATH . 'widgets/clients.php';
            require_once INTERIOR_COMPANION_EW_DIR_PATH . 'widgets/gallery.php';
            require_once INTERIOR_COMPANION_EW_DIR_PATH . 'widgets/exibition.php';
            require_once INTERIOR_COMPANION_EW_DIR_PATH . 'widgets/project-details.php';

        }

        /**
         * Register Widgets
         *
         * Register interior companion widgets.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access private
         */
        private function register_widgets() {
            //  Register elements widgets   
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Interiorelementor\Widgets\Interior_Banner() ); 
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Interiorelementor\Widgets\Interior_sh() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Interiorelementor\Widgets\Interior_About() ); 
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Interiorelementor\Widgets\Interior_Contact() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Interiorelementor\Widgets\Interior_Features() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Interiorelementor\Widgets\Interior_Cta() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Interiorelementor\Widgets\Interior_Testimonial() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Interiorelementor\Widgets\Interior_Clients() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Interiorelementor\Widgets\Interior_Gallery() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Interiorelementor\Widgets\Interior_Exibition() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Interiorelementor\Widgets\Interior_Project_Details() );


        }

    }
}
// Make sure the same function is not loaded twice in free/premium versions.



if ( !function_exists( 'interior_el_widgets_load' ) ) {
    /**
     * Load Interior elementor widget
     *
     * Main instance of Press_Elements.
     *
     * @since 1.0.0
     * @since 1.7.0 The logic moved from this function to a class method.
     */
    function interior_el_widgets_load() {
        return Interior_El_Widgets::instance();
    }

    // Run interior elementor widget
    interior_el_widgets_load();
}


add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style('elementor-global');
});