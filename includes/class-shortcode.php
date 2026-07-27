<?php
/**
 * Shortcode
 *
 * @package OdawaraSewingStudio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class OSS_Shortcode {

	public function __construct() {
		add_shortcode(
			'odawara_sewing_studio',
			array( $this, 'render' )
		);
	}

	public function render() {

		ob_start();

		include OSS_PLUGIN_PATH . 'templates/home.php';

		return ob_get_clean();

	}
}