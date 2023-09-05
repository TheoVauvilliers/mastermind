<?php

namespace App\Service;

use App\Entity\Mastermind;

class Random
{
    public static function generateCodePegs(): array
    {
        $generatedValues  = [];

        for ($i = 0; $i < Mastermind::PEGS; $i++) {
            $generatedValues[] = Mastermind::COLORS[random_int(0, count(Mastermind::COLORS) - 1)];
        }

       return $generatedValues; 
    }
}
