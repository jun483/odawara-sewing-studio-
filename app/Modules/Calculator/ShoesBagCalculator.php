<?php

namespace OSS\Modules\Calculator;

if (!defined('ABSPATH')) {
    exit;
}

class ShoesBagCalculator implements CalculatorInterface
{
    public function calculate(array $data): array
    {
        $width  = max(1, (float)$data['width']);
        $height = max(1, (float)$data['height']);
        $qty    = max(1, (int)$data['quantity']);

        $seam = 2;

        $cutWidth  = $width + ($seam * 2);
        $cutHeight = $height + ($seam * 2);

        $fabric = ($cutHeight * 2 * $qty) * 1.10;

        return [
            'success' => true,
            'title' => 'シューズバッグ',
            'cut_width' => round($cutWidth,1),
            'cut_height' => round($cutHeight,1),
            'fabric' => round($fabric / 100,2),
            'lining' => round($fabric / 100,2),
            'handle' => 35 * $qty,
            'dkan' => $qty
        ];
    }
}