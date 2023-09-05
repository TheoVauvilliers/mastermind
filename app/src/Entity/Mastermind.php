<?php

namespace App\Entity;

use App\Constant\MastermindConstant;
use App\Interface\InitializableInterface;
use App\Service\Speaker;

class Mastermind implements InitializableInterface
{
    private bool $isWin = false;
    private int $currentRound = 0;

    private CodeMaker $codeMaker;
    private CodeBreaker $codeBreaker;
    
    public function initialize(): void
    {
        $this->codeMaker = new CodeMaker();
        $this->codeBreaker = new CodeBreaker();
    }

    public function run(): void
    {
        $codePegs = $this->codeMaker->getCodePegs();
        echo 'Code Maker choose : ' . implode(', ', $codePegs) . PHP_EOL;

        while (!$this->isWin && $this->currentRound <= MastermindConstant::ROUNDS) {
            Speaker::round($this->currentRound + 1);

            $selectedPegs = $this->codeBreaker->getCodePegs();

            if ($this->codeIsIdentical($codePegs, $selectedPegs)) {
                $this->isWin = true;
            } else {
                $keyPegs = $this->codeMaker->getKeyPegs($selectedPegs);
                Speaker::annonceKeyPegs($keyPegs);
                $this->currentRound++;
            }
        }

        Speaker::result($this->isWin ? 'win' : 'lose');
    }

    private function codeIsIdentical(array $codePegs, array $selectedPegs): bool
    {
        for ($i = 0; $i < MastermindConstant::PEGS; $i++) {
            if ($codePegs[$i] !== $selectedPegs[$i]) {
                return false;
            }
        }

        return true;
    }
}
