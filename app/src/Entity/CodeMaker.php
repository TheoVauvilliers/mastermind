<?php

namespace App\Entity;

use App\Enum\KeyPegColorEnum;
use App\Service\Random;

final class CodeMaker extends AbstractCodeEntity
{
    public function getCodePegs(bool $reset = false): array
    {
        if (empty($this->codePegs) || $reset ) {
            $this->codePegs = $this->generateCodePegs();
        }

        return $this->codePegs;
    }

    /**
     * TODO: Fix a bug that does not handle pegs well due to a uniqueness problem on the check
     * @return string[]
     */
    public function getKeyPegs(array $selectedCodePegs): array
    {
        $keyPegs = [];

        foreach ($selectedCodePegs as $key => $color) {
            if (\in_array($color,  $this->codePegs)) {
                if ($selectedCodePegs[$key] === $this->codePegs[$key]) {
                    $keyPeg = KeyPegColorEnum::Found->value;
                } else {
                    $keyPeg = KeyPegColorEnum::PartiallyFound->value;   
                }
            } else {
                $keyPeg = KeyPegColorEnum::NotFound->value;
            }

            $keyPegs[] = $keyPeg;
        }

        shuffle($keyPegs);

        return $keyPegs;
    }

    /**
     * @return string[]
     */
    private function generateCodePegs(): array
    {
        return Random::generateCodePegs();
    }
}
