<?php
/**
 * Lesson Bag Calculator
 *
 * @package OdawaraSewingStudio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class OSS_Lesson_Bag extends OSS_Calculator {

	/**
	 * 計算
	 *
	 * @param array $data
	 * @return array
	 */
	public function calculate( array $data ): array {

		$width  = (float) $data['width'];
		$height = (float) $data['height'];
		$qty    = max( 1, (int) $data['quantity'] );

		// 裁断サイズ
		$cut = $this->cutSize( $width, $height );

		// 表地長さ（前後2枚）
		$fabricLength = $cut['height'] * 2 * $qty;

		// ロス率追加
		$fabricLength = $this->addLoss( $fabricLength );

		return array(
			'cut_width'   => $cut['width'],
			'cut_height'  => $cut['height'],
			'fabric_cm'   => $fabricLength,
			'fabric_m'    => $this->toMeter( $fabricLength ),
			'lining_m'    => $this->toMeter( $fabricLength ),
			'handle_cm'   => 70 * $qty,
			'interfacing' => round(
				($cut['width'] * $cut['height']) / 10000,
				2
			),
		);

	}
}