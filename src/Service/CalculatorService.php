<?php

namespace App\Service;

class CalculatorService
{
    public function calculateArea(array $points): float
    {
        $points[] = $points[0];
        $len = count($points);
        $area = 0;
        $x = $points[0]->x;
        $y = $points[0]->y;
        for ($i = 1; $i < $len; ++$i) {
            $area += $points[$i]->x * $y - $points[$i]->y * $x;
            $x = $points[$i]->x;
            $y = $points[$i]->y;
        }
        return abs($area/2);
    }
}