<?php

namespace OSS\Modules\Calculator;

if (!defined('ABSPATH')) {
    exit;
}

class FabricCalculator
{
    /**
     * 生地必要量を計算
     *
     * @param float $cutWidth     裁断幅(cm)
     * @param float $cutHeight    裁断高さ(cm)
     * @param int   $pieces       パーツ枚数
     * @param int   $fabricWidth  生地幅(cm)
     * @param float $lossRate     ロス率(0.10 = 10%)
     */
    public function calculate(
        float $cutWidth,
        float $cutHeight,
        int $pieces,
        int $fabricWidth = 110,
        float $lossRate = 0.10
    ): array {

        if ($cutWidth <= 0 || $cutHeight <= 0 || $pieces <= 0) {
            return [
                'fabric_width'   => $fabricWidth,
                'pieces_per_row' => 0,
                'rows'           => 0,
                'length_cm'      => 0,
                'length_m'       => 0,
                'waste_width'    => 0,
            ];
        }

        // 横方向に何枚並ぶか
        $piecesPerRow = max(
            1,
            (int) floor($fabricWidth / $cutWidth)
        );

        // 必要段数
        $rows = (int) ceil($pieces / $piecesPerRow);

        // 必要長さ(cm)
        $length = $rows * $cutHeight;

        // ロス追加
        $length *= (1 + $lossRate);

        // 切り上げ
        $length = ceil($length);

        // 横の余り
        $usedWidth = $piecesPerRow * $cutWidth;

        $wasteWidth = max(
            0,
            $fabricWidth - $usedWidth
        );

        return [

            'fabric_width' => $fabricWidth,

            'pieces_per_row' => $piecesPerRow,

            'rows' => $rows,

            'length_cm' => $length,

            'length_m' => round($length / 100, 2),

            'used_width' => round($usedWidth, 1),

            'waste_width' => round($wasteWidth, 1),

            'loss_rate' => $lossRate

        ];
    }
}