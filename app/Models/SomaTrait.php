<?php

declare(strict_types=1);

namespace App\Models;

trait SomaTrait
{
    public function soma(float $a, float $b): float
    {
        return $a + $b;
    }
}