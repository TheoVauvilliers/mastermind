<?php

namespace App\Entity;

final class CodeBreaker extends AbstractCodeEntity
{
    public function getCodePegs(): array
    {    
        $this->codePegs = [];

        for ($i = 0; $i < Mastermind::PEGS; $i++) {
            do {
                $peg = $this->askForPegs();
            } while (!$this->isValidPeg($peg));

            $this->codePegs[] = $peg;
        }

        return $this->codePegs;
    }

    private function askForPegs(): string
    {
        $colors = implode(', ', Mastermind::COLORS);
        return readline('Enter a color (' . $colors . ') : ');
    }

    private function isValidPeg(string $input): bool
    {
        foreach (Mastermind::COLORS as $color) {
            if ($color === $input) {
                return true;
            }
        }

        return false;
    }
}
