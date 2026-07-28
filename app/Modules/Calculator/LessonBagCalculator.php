<?php

namespace OSS\Modules\Calculator;

if (!defined('ABSPATH')) {
    exit;
}

class LessonBagCalculator implements CalculatorInterface
{
    public function calculate(array $data): array
    {
        $width  = max(1, (float)$data['width']);
        $height = max(1, (float)$data['height']);
        $qty    = max(1, (int)$data['quantity']);

        // 縫い代
        $seam = 2;

        // 裁断サイズ
        $cutWidth  = $width + ($seam * 2);
        $cutHeight = $height + ($seam * 2);

        // 表地・裏地（前後2枚）
        $fabricLength = ($cutHeight * 2 * $qty);

        // ロス10%
        $fabricLength *= 1.1;

        return [

            'success' => true,

            'title' => 'レッスンバッグ',

            'cut_width' => round($cutWidth,1),

            'cut_height' => round($cutHeight,1),

            'fabric' => round($fabricLength / 100,2),

            'lining' => round($fabricLength / 100,2),

            'handle' => 70 * $qty,

            'interfacing' => round(
                ($cutWidth * $cutHeight) / 10000,
                2
            )

        ];
    }
}