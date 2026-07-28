<?php

namespace OSS\Modules\Calculator;

if (!defined('ABSPATH')) {
    exit;
}

class CalculatorEngine
{
    /**
     * 計算実行
     */
    public function calculate(array $data): array
    {
        $type = sanitize_text_field($data['type'] ?? '');

        return match ($type) {
            'lesson'    => $this->lessonBag($data),
            'shoes'     => $this->shoesBag($data),
            'drawstring'=> $this->drawstring($data),
            default     => [
                'success' => false,
                'message' => '作品が見つかりません。'
            ],
        };
    }

    /**
     * レッスンバッグ
     */
    private function lessonBag(array $data): array
    {
        $width  = (float)$data['width'];
        $height = (float)$data['height'];
        $qty    = max(1, (int)$data['quantity']);

        $fabric = (($height + 4) * 2 * $qty) * 1.1;

        return [
            'success' => true,
            'title' => 'レッスンバッグ',
            'fabric' => round($fabric / 100, 2),
            'lining' => round($fabric / 100, 2),
            'handle' => 70 * $qty,
            'interfacing' => round(($width * $height) / 10000, 2)
        ];
    }

    /**
     * シューズバッグ
     */
    private function shoesBag(array $data): array
    {
        $width  = (float)$data['width'];
        $height = (float)$data['height'];
        $qty    = max(1, (int)$data['quantity']);

        $fabric = (($height + 4) * 2 * $qty) * 1.1;

        return [
            'success' => true,
            'title' => 'シューズバッグ',
            'fabric' => round($fabric / 100, 2),
            'lining' => round($fabric / 100, 2),
            'handle' => 35 * $qty,
            'dkan' => 1 * $qty
        ];
    }

    /**
     * 巾着
     */
    private function drawstring(array $data): array
    {
        $width  = (float)$data['width'];
        $height = (float)$data['height'];
        $qty    = max(1, (int)$data['quantity']);

        $fabric = (($height + 6) * 2 * $qty) * 1.1;

        return [
            'success' => true,
            'title' => '巾着袋',
            'fabric' => round($fabric / 100, 2),
            'lining' => 0,
            'cord' => ($width * 2 + 60) * $qty
        ];
    }
}