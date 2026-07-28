<?php

namespace OSS\Modules\Calculator;

if (!defined('ABSPATH')) {
    exit;
}

class CalculatorEngine
{
    public function calculate(array $data): array
    {
        try {

            $calculator = CalculatorFactory::create(
                $data['type']
            );

            return $calculator->calculate($data);

        } catch (\Throwable $e) {

            return [

                'success' => false,

                'message' => $e->getMessage()

            ];

        }
    }
}