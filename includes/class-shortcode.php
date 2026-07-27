<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class OMFC_Shortcode {

	public function __construct() {

		add_shortcode(
			'odawara_fabric_calculator',
			[ $this, 'render' ]
		);

	}

	public function render() {

		ob_start();

		include OMFC_PATH . 'templates/calculator.php';

		return ob_get_clean();

	}

}
