<?php

/**
 * This is the main plugin file
 *
 * The Wordpress Objected-Oriented Nonces is a plugin that facilitates the use of
 * Wordpress nonces in a object-oriented fashion, by providing a class
 * with functions that implement the original nonce-related function.
 *
 * @package WP_OO_Nonces
 * @version 1.0
 * 
 * @wordpress-plugin
 * Plugin Name:       Wordpress Objected-Oriented Nonces
 * Plugin URI:        http://github.com/bayodesegun/wordpress-oo-nonces
 * Description:       A plugin that allows working with Wordpress nonces in an objected-oriented fashion. Once activated, the "WP_OO_Nonces" class is globally available for instatiation and use.
 * Version:           1.0.0
 * Author:            Bayode Aderinola
 * Author URI:        http://github.com/bayodesegun
 */
 
// If this file is called directly, then about execution.
defined( 'WPINC' ) or die( ' Forbidden! ');

// If the absolute path is not defined, we can't go on as well
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Main plugin class housing functions that implement the Wordpress nonce-related functions.
 *
 * The class function have the same names as the original function names, except that the 
 * 'wp_' prefix is dropped where present.
 *
 * @since 1.0.0
 */
class WP_OO_Nonces {

	/**
     * Instantiates the plugin class
     */
	public function __construct() {

	}

	/**
	 * Implements the wp_nonce_url function
	 * @see https://codex.wordpress.org/Function_Reference/wp_nonce_url
	 * 
	 * @since 1.0.0
	 *
	 * @param string $actionurl. URL to add nonce action.
	 * @param string $action. Nonce action name.
	 * @param string $name. Nonce name.
	 * @return string Original URL with nonce action added
	 */
	public function nonce_url($actionurl, $action = -1, $name = '_wpnonce') {
		return wp_nonce_url($actionurl, $action, $name);	
	}

	/**
	 * Implements the wp_create_nonce function
	 * @see https://codex.wordpress.org/Function_Reference/wp_create_nonce
	 * 
	 * @since 1.0.0
	 *
	 * @param string $action. Nonce action name.
	 * @return string The nonce.
	 */
	public function create_nonce($action = -1) {
		return wp_create_nonce($action);	
	}

	/**
	 * Implements the wp_nonce_field function
	 * @see https://codex.wordpress.org/Function_Reference/wp_nonce_field
	 * 
	 * @since 1.0.0
	 *
	 * @param string $action. Nonce action name.
	 * @param string $name. Nonce name.
	 * @param boolean $referer. Whether also the referer hidden form field should be created
	 * @param boolean $echo. Whether to display or return the nonce field
	 * @return string The nonce form field (followed by the referer field if requested)
	 */
	public function nonce_field($action = -1, $name = '_wpnonce', $referer = true, $echo = true) {
		return wp_nonce_field($action, $name, $referer, $echo);	
	}

	/**
	 * Implements the wp_referer_field function
	 * @see https://codex.wordpress.org/Function_Reference/wp_referer_field
	 * 
	 * @since 1.0.0
	 *
	 * @param boolean $echo. Whether to display or return the referer field
	 * @return string The referer form field
	 */
	public function referer_field($echo = true) {
		return wp_referer_field($echo);	
	}

	/**
	 * Implements the wp_verify_nonce function
	 * @see https://codex.wordpress.org/Function_Reference/wp_verify_nonce
	 * 
	 * @since 1.0.0
	 *
	 * @param string $nonce. The nonce to verify.
	 * @param string $action. Nonce action name.
	 * @return string The nonce.
	 */
	public function verify_nonce($nonce, $action = -1) {
		return wp_verify_nonce($nonce, $action);	
	}

	/**
	 * Implements the check_admin_referer function
	 * @see https://codex.wordpress.org/Function_Reference/check_admin_referer
	 * 
	 * @since 1.0.0
	 *
	 * @param string $action. Nonce action name.
	 * @param string $query_arg. Where to look for nonce in the $_REQUEST PHP variable. 
	 * @return boolean Whether the check passes or not.
	 */
	public function check_admin_referer($action = -1, $query_arg = '_wpnonce') {
		return check_admin_referer($action, $query_arg);	
	}

	/**
	 * Implements the check_ajax_referer function
	 * @see https://codex.wordpress.org/Function_Reference/check_ajax_referer
	 * 
	 * @since 1.0.0
	 *
	 * @param string $action. Nonce action name.
	 * @param string $query_arg. Where to look for nonce in the $_REQUEST PHP variable.
	 * @param boolean $die. Whether to die if the nonce is invalid.
	 * @return boolean Whether the check passes or not.
	 */
	public function check_ajax_referer($action = -1, $query_arg = false, $die = true) {
		return check_ajax_referer($action, $query_arg, $die);	
	}
}
