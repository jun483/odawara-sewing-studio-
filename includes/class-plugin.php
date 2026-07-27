<?php
/**
 * Plugin Core
 *
 * @package OdawaraSewingStudio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Odawara_Sewing_Studio {

	/**
	 * インスタンス
	 *
	 * @var Odawara_Sewing_Studio|null
	 */
	private static $instance = null;

	/**
	 * シングルトン
	 *
	 * @return Odawara_Sewing_Studio
	 */
	public static function instance() {

		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * コンストラクタ
	 */
	private function __construct() {

		$this->load_files();

		add_action(
			'plugins_loaded',
			array( $this, 'init' )
		);
	}

	/**
	 * 必要ファイル読込
	 */
	private function load_files() {

		require_once OSS_PLUGIN_PATH . 'includes/class-assets.php';
		require_once OSS_PLUGIN_PATH . 'includes/class-shortcode.php';

	}

	/**
	 * 初期化
	 */
	public function init() {

		new OSS_Assets();
		new OSS_Shortcode();

	}

}