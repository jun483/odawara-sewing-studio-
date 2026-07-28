<?php

namespace OSS\Modules\Calculator;

if (!defined('ABSPATH')) {
    exit;
}

class CalculatorFactory
{
    public static function create(string $type): CalculatorInterface
    {
        return match ($type) {

            'lesson' => new LessonBagCalculator(),

            default => throw new \Exception('Calculator not found'),

        };
    }
}