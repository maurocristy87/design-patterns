<?php

namespace App\DI;

class SaluteFormatter
{
    public function formatSalute(string $salute)
    {
        return $salute . ' is now formatted';
    }
}
