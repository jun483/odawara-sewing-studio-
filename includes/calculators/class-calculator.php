<?php
/**
 * Base Calculator
 *
 * @package OdawaraSewingStudio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class OSS_Calculator {

	/**
	 * デフォルト設定
	 */
	protected array $settings = array(
		'fabric_width' => 110, // cm
		'seam_allowance' => 1, // cm
		'pattern_margin' => 10, // 柄合わせ
		'loss_rate' => 0.05, // 5%
	);

	/**
	 * 裁断サイズを取得
	 */
	protected function cutSize(
		float $width,
		float $height,
		float $top = 0,
		float $bottom = 0
	): array {

		$cutWidth = $width + ($this->settings['seam_allowance'] * 2);

		$cutHeight = $height
			+ ($this->settings['seam_allowance'] * 2)
			+ $top
			+ $bottom;

		return array(
			'width' => $cutWidth,
			'height' => $cutHeight,
		);

	}

	/**
	 * ロス率込み
	 */
	protected function addLoss(float $length): float {

		return ceil(
			$length * (1 + $this->settings['loss_rate'])
		);

	}

	/**
	 * cm → m
	 */
	protected function toMeter(float $cm): float {

		return round($cm / 100, 2);

	}

}