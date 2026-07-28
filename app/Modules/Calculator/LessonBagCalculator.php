<?php

namespace OSS\Modules\Calculator;

if (!defined('ABSPATH')) {
    exit;
}

class LessonBagCalculator implements CalculatorInterface
{
    public function calculate(array $data): array
    {
        // 入力値
        $width = max(1, (float)($data['width'] ?? 40));
        $height = max(1, (float)($data['height'] ?? 30));
        $quantity = max(1, (int)($data['quantity'] ?? 1));

        // 生地幅（デフォルト110cm）
        $fabricWidth = max(90, (int)($data['fabric_width'] ?? 110));

        // 設定
        $seamAllowance = 2.0;
        $lossRate = 0.10;

        // 裁断サイズ
        $cutWidth = $width + ($seamAllowance * 2);
        $cutHeight = $height + ($seamAllowance * 2);

        // 前後2枚
        $pieces = $quantity * 2;

        // 共通生地計算
        $fabricCalculator = new FabricCalculator();

        $fabric = $fabricCalculator->calculate(
            $cutWidth,
            $cutHeight,
            $pieces,
            $fabricWidth,
            $lossRate
        );

        // 接着芯
        $interfacing = ($cutWidth * $cutHeight * $quantity) / 10000;

        return [

            'success' => true,

            'title' => 'レッスンバッグ',

            // 入力値
            'width' => $width,
            'height' => $height,
            'quantity' => $quantity,

            // 裁断サイズ
            'cut_width' => round($cutWidth, 1),
            'cut_height' => round($cutHeight, 1),

            // 生地
            'fabric' => $fabric['length_m'],
            'lining' => $fabric['length_m'],

            // 生地情報
            'fabric_width' => $fabric['fabric_width'],
            'pieces_per_row' => $fabric['pieces_per_row'],
            'rows' => $fabric['rows'],
            'length_cm' => $fabric['length_cm'],

            // 副資材
            'handle' => 70 * $quantity,
            'interfacing' => round($interfacing, 2),

            // デバッグ用
            'pieces' => $pieces,

        ];
    }
}