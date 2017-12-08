<?php
   /*
   Plugin Name: UM Extend Profile Progress
   Description: Extension for Ultimate Member Plugin. Add a Profile Progress using a shortcode.	
   Version: 1.0.1
   License: GPL2
   */



/**
 * The main class that handles the entire output, content filters, etc., for this plugin.
 *
 * @package UM Extend Profile Progress
 * @since 1.0
 */
class UM_Extend_Profile_Progress {


	/** Constructor */
	function __construct() {

		register_activation_hook( __FILE__, array( $this, 'activation_hook' ) );
		add_action('admin_menu', array($this, 'add_plugin_menu'));	
		add_shortcode('um-ext-profile-progress', array($this, 'um_extend_profile_progress'));

	}

	function activation_hook() {
		wp_enqueue_style( 'floating-bubble-text-styling', plugins_url( '/assets/style.css', __FILE__  ) );
		wp_enqueue_script( 'floating-bubble-text-script', plugins_url('/assets/floating-bubble-text-script.js', __FILE__ ), array(), '1.0.0', true );

		add_option( 'um_profile_progress_options', '[]', '', 'no' );
	}

	public function add_plugin_menu() {
 		add_submenu_page(
 			'ultimatemember', //parent slug
			'Profile Progress', //page title
			'Profile Progress', //menu title
			'manage_options', //capability
			'um-extend-profile-progress', //menu slug
			array($this, 'render_profile_progress') //function
		);
	}

	public function render_profile_progress(){
		//insert
	    if ($_POST['insert']) {
	        $con = update_option( 'um_profile_progress_options', $_POST, 'no' );
	        if ( ! $con )
	            $message = "Failed to save";
	        else {
	            $message = "Successfully saved";
	        }
	    }
		$meta_keys = $this->get_user_meta_key();
		$option = gettype(get_option("um_profile_progress_options")) == "string" ? json_decode(get_option("um_profile_progress_options")) : get_option("um_profile_progress_options");
		$saved_meta_keys = $option == NULL ? array('del' => 'del') : get_option("um_profile_progress_options");
		include( plugin_dir_path( __FILE__ ) . 'pages/profile-progress-menu.php');
	}

	function um_extend_profile_progress( $atts ) {
		$current_user = wp_get_current_user();
		$cID = $current_user->ID;

		$option = gettype(get_option("um_profile_progress_options")) == "string" ? json_decode(get_option("um_profile_progress_options")) : get_option("um_profile_progress_options");
		$meta_keys = $option == NULL ? array('del' => 'del') : get_option("um_profile_progress_options");
		unset($meta_keys['insert']);
		foreach ($meta_keys as $key => $value) {
			$user_info[] = get_user_meta($cID, $value, true);
		}

		$len = sizeof($user_info);
		$d = 0;

		foreach ($user_info as $key => $value) {
			$d += $value != "" ? 1 : 0;
		}

		$progress = round(($d / $len) * 100, 2);
	    
	    // begin output buffering
	    ob_start();

		//echo $progress;

		include( plugin_dir_path( __FILE__ ) . 'profile-progress/progress-bar.php');

		// end output buffering, grab the buffer contents, and empty the buffer
    	return ob_get_clean();
	}


	function get_user_meta_key() {
	    global $wpdb;
	    $select = "SELECT distinct $wpdb->usermeta.meta_key FROM $wpdb->usermeta";
	    $usermeta = $wpdb->get_results($select);
	  
	    return $usermeta;
	}

}

$UM_Extend_Profile_Progress = new UM_Extend_Profile_Progress;


