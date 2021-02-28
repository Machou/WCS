<?php

namespace App\Service;

class CalculService
{
    private int $points = 10000;

    public function calculPointsByYear(int $year): int
    {
        $count = 0;
        for ($i = 2021; $i > 100; $i -= 1) {
            $count += 200;
            $points = $this->points - $count;
            if ($year == $i) {
                return $points;
            }
        }
        return $this->points;
    }

    public function calculPointsByKm(int $kilometers): int
    {
        $count = 0;
        for ($i = 0; $i < 1000000; $i++) {
            if ($i % 1000 == 0) {
                $count += 50;
            }
            $points = $this->points - $count;
            if ($kilometers == $i) {
                return $points;
            }
        }
        return $this->points;
    }
}
