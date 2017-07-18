<?php
/*
	Plugin Name: FedEx WooCommerce Extension (BASIC)
	Plugin URI: https://www.xadapter.com/product/woocommerce-fedex-shipping-plugin-with-print-label/
	Description: Obtain real time shipping rates via FedEx Shipping API.
	Version: 2.0.5
	Author: XAdapter
	Author URI: https://www.xadapter.com/
	Text Domain: wf-shipping-fedex
*/

define("WF_Fedex_ID", "wf_fedex_woocommerce_shipping");
define("WF_FEDEX_ADV_DEBUG_MODE", "off"); // Turn 'on' to allow advanced debug mode.

/**
 * Plugin activation check
 */
function wf_fedex_pre_activation_check(){
	//check if basic version is there
	if ( is_plugin_active('fedex-woocommerce-shipping-method/fedex-woocommerce-shipping.php') ){
        deactivate_plugins( basename( __FILE__ ) );
		wp_die( __("Oops! You tried installing the premium version without deactivating and deleting the basic version. Kindly deactivate and delete FedEx(Basic) Woocommerce Extension and then try again", "wf-shipping-fedex" ), "", array('back_link' => 1 ));
	}
	set_transient('wf_fedex_welcome_screen_activation_redirect', true, 30);
}

register_activation_hook( __FILE__, 'wf_fedex_pre_activation_check' );

/**
 * Check if WooCommerce is active
 */
if (in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {	

	
	if (!function_exists('wf_get_settings_url')){
		function wf_get_settings_url(){
			return version_compare(WC()->version, '2.1', '>=') ? "wc-settings" : "woocommerce_settings";
		}
	}
	
	if (!function_exists('wf_plugin_override')){
		add_action( 'plugins_loaded', 'wf_plugin_override' );
		function wf_plugin_override() {
			if (!function_exists('WC')){
				function WC(){
					return $GLOBALS['woocommerce'];
				}
			}
		}
	}
	if (!function_exists('wf_get_shipping_countries')){
		function wf_get_shipping_countries(){
			$woocommerce = WC();
			$shipping_countries = method_exists($woocommerce->countries, 'get_shipping_countries')
					? $woocommerce->countries->get_shipping_countries()
					: $woocommerce->countries->countries;
			return $shipping_countries;
		}
	}
	if(!class_exists('wf_fedEx_wooCommerce_shipping_setup')){
		class wf_fedEx_wooCommerce_shipping_setup {
			
			public function __construct() {

                add_action('admin_init', array($this,'wf_fedex_welcome'));
                add_action('admin_menu', array($this,'wf_fedex_welcome_screen'));
                add_action('admin_head', array($this,'wf_fedex_welcome_screen_remove_menus'));
				
				$this->wf_init();
				add_action( 'init', array( $this, 'init' ) );
				add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'plugin_action_links' ) );
				add_action( 'woocommerce_shipping_init', array( $this, 'wf_fedEx_wooCommerce_shipping_init' ) );
				add_filter( 'woocommerce_shipping_methods', array( $this, 'wf_fedEx_wooCommerce_shipping_methods' ) );		
				add_filter( 'admin_enqueue_scripts', array( $this, 'wf_fedex_scripts' ) );		
							
			}
			public function wf_fedex_welcome()
            {
	          	if (!get_transient('wf_fedex_welcome_screen_activation_redirect')) {
	           		 return;
	        	}
	       	 	delete_transient('wf_fedex_welcome_screen_activation_redirect');
	        	wp_safe_redirect(add_query_arg(array('page' => 'Fedex-Welcome'), admin_url('index.php')));
            }
            public function wf_fedex_welcome_screen()
            {
            	add_dashboard_page('Welcome To Fedex', 'Welcome To Fedex', 'read', 'Fedex-Welcome', array($this,'wf_fedex_screen_content'));
            }
            public function wf_fedex_screen_content()
            {
            	include 'includes/wf_fedex_welcome.php';
            }
            public function wf_fedex_welcome_screen_remove_menus()
            {
            	 remove_submenu_page('index.php', 'Fedex-Welcome');
            }
			public function init(){
				if ( ! class_exists( 'wf_order' ) ) {
					include_once 'includes/class-wf-legacy.php';
				}		
			}
			public function wf_init() {
				// Localisation
				load_plugin_textdomain( 'wf-shipping-fedex', false, dirname( plugin_basename( __FILE__ ) ) . '/i18n/' );
			}
			
			public function wf_fedex_scripts() {
				wp_enqueue_script( 'jquery-ui-sortable' );
			}
			
			public function plugin_action_links( $links ) {
				$plugin_links = array(
					'<a href="' . admin_url( 'admin.php?page=' . wf_get_settings_url() . '&tab=shipping&section=wf_fedex_woocommerce_shipping_method' ) . '">' . __( 'Settings', 'wf-shipping-fedex' ) . '</a>',
					'<a href="https://www.xadapter.com/product/woocommerce-fedex-shipping-plugin-with-print-label/" target="_blank">' . __('Premium Upgrade', 'wf-shipping-fedex') . '</a>',
                    '<a href="https://wordpress.org/support/plugin/fedex-woocommerce-shipping-method" target="_blank">' . __('Support', 'wf-shipping-fedex') . '</a>',
                    '<a href="'.admin_url('index.php?page=Fedex-Welcome').'" style="color:green;" >' . __('Get Started', 'wf_fedEx_wooCommerce_shipping') . '</a>'
				);
				return array_merge( $plugin_links, $links );
			}			
			
			public function wf_fedEx_wooCommerce_shipping_init() {
				include_once( 'includes/class-wf-fedex-woocommerce-shipping.php' );
			}

			
			public function wf_fedEx_wooCommerce_shipping_methods( $methods ) {
				$methods[] = 'wf_fedex_woocommerce_shipping_method';
				return $methods;
			}		
		}
		new wf_fedEx_wooCommerce_shipping_setup();
	}
}
