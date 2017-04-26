<?php 
/*
Plugin Name: CodeFlavors Featured Post
Plugin URI: 
Description: Feature any post with custom templates on any of your pages by using shortcodes
Version: 1.1.1
Author: CodeFlavors
Author URI: http://www.codeflavors.com
Domain Path: /languages
Text Domain: codeflavors-featured-post
*/	

// No direct access
if( !defined( 'ABSPATH' ) ){
	die();
}

define( 'CFP_PATH'		, plugin_dir_path(__FILE__) );
define( 'CFP_URL'		, plugin_dir_url(__FILE__) );
define( 'CFP_VERSION'	, '1.1.1');

// plugin functions
require_once CFP_PATH . 'includes/functions.php';
require_once cfp_path( 'includes/compatibility.php' );

/**
 * Plugin class. Starts and sets the plugin.
 *
 * @since 1.0
 * @package Video WP plugin
 */
class CFP_Plugin{	
    /**
	 * Constructor
	 */
	static function start(){	
		// init function
		add_action( 'init', array( 'CFP_Plugin', 'on_init' ), -999);
		
		// load the widgets
		add_action( 'widgets_init', array( 'CFP_Plugin', 'load_widgets' ) );
		
		// plugin activation hook
		register_activation_hook(  __FILE__,  array( 'CFP_Plugin', 'install' ) );		
	}
	
	/**
	 * Action 'init' callback.
	 * @return void
	 */
	static function on_init(){
	    // start shortcodes
		require_once cfp_path( 'includes/libs/class-cfp-shortcodes.php' );
		
		
		// only for admin area
		if( is_admin() ){
			// localization - needed only for admin area
			load_plugin_textdomain( 'codeflavors-featured-post', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
			
			// add admin specific functions
			require_once cfp_path( 'includes/admin/functions.php' );
			
			// add administration management
			require_once cfp_path( 'includes/admin/libs/class-cfp-admin.php' );			
		}				
	}
	
	/**
	 * Starts the plugin widgets.
	 * @return void
	 */
	static function load_widgets(){
        
	    if( !class_exists( 'CFP_Featured_Post_Widget' ) ){
	        require_once cfp_path('includes/libs/class-cfp-featured-post-widget.php');
	    }
	    // register the slideshow widget
	    register_widget( 'CFP_Featured_Post_Widget' );
	    
	}
	
	/**
	 * Plugin activation hook callback function.
	 * Performs any maintenance actions needed to be done on activation.
	 */
	static function install(){
	    // set a transient on plugin activation to allow it to redirect user to about page and get more details about the plugin
	    self::activate_about_page();
	}
	
	/**
	 * On activation it will set up a transient that flags the plugin
	 * it was just activated and will redirect user to about plugin page.
	 *
	 * @return void
	 */
	static function activate_about_page(){
	    set_transient( 'cfp_about_page_activated' , time(), 30 );
	}
}

CFP_Plugin::start();