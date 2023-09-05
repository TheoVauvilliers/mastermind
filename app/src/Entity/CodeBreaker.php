<?php

namespace App\Entity;

use App\Constant\MastermindConstant;
use App\Enum\CodePegColorEnum;

final class CodeBreaker extends AbstractCodeEntity
{
    public function getCodePegs(): array
    {    
        $this->codePegs = [];

        for ($i = 0; $i < MastermindConstant::PEGS; $i++) {
            do {
                $peg = $this->askForPegs();
            } while (!$this->isValidPeg($peg));

            $this->codePegs[] = $peg;
        }

        return $this->codePegs;
    }

    private function askForPegs(): string
    {
        $colors = '';

        foreach(CodePegColorEnum::cases() as $color) {
            $colors .= ' ' . $color->value;
        }

        return readline('Enter a color (' . $colors . ') : ');
    }

    private function isValidPeg(string $input): bool
    {
        foreach (CodePegColorEnum::cases() as $color) {
            if ($color->value === $input) {
                return true;
            }
        }

        return false;
    }
}
