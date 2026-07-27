<?php
/**
 * Assets Loader
 *
 * @package OdawaraSewingStudio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class OSS_Assets {

	/**
	 * コンストラクタ
	 */
	public function __construct() {

		add_action(
			'wp_enqueue_scripts',
			array( $this, 'enqueue_assets' )
		);

	}

	/**
	 * CSS・JavaScriptを読み込む
	 */
	public function enqueue_assets() {

		wp_enqueue_style(
			'oss-app',
			OSS_PLUGIN_URL . 'assets/css/app.css',
			array(),
			OSS_VERSION
		);

		wp_enqueue_script(
			'oss-app',
			OSS_PLUGIN_URL . 'assets/js/app.js',
			array(),
			OSS_VERSION,
			true
		);

	}

}