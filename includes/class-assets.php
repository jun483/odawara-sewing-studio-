<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class OMFC_Assets {

	public function __construct() {

		add_action(
			'wp_enqueue_scripts',
			[ $this, 'enqueue' ]
		);

	}

	public function enqueue() {

		wp_enqueue_style(
			'omfc-style',
			OMFC_URL . 'assets/css/calculator.css',
			[],
			OMFC_VERSION
		);

		wp_enqueue_script(
			'omfc-app',
			OMFC_URL . 'assets/js/app.js',
			[],
			OMFC_VERSION,
			true
		);

	}

}