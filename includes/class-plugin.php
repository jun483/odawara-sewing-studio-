<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class OMFC_Plugin {

	public function __construct() {

		require_once OMFC_PATH . 'includes/class-assets.php';
		require_once OMFC_PATH . 'includes/class-shortcode.php';

		new OMFC_Assets();
		new OMFC_Shortcode();

	}

}