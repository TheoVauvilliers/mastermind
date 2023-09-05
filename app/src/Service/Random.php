<?php

namespace App\Service;

use App\Constant\MastermindConstant;
use App\Enum\CodePegColorEnum;

class Random
{
    public static function generateCodePegs(): array
    {
        $generatedValues  = [];
        $colors = [];

        foreach(CodePegColorEnum::cases() as $color) {
            $colors[] = $color->value;
        }

        for ($i = 0; $i < MastermindConstant::PEGS; $i++) {
            $generatedValues[] = $colors[random_int(0, count($colors) - 1)];
        }

       return $generatedValues; 
    }
}
