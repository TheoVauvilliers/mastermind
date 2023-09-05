<?php

namespace App\Entity;

abstract class AbstractCodeEntity
{
    /** @var string[] */
    protected array $codePegs = [];

    /**
     * @return string[]
     */
    abstract public function getCodePegs(): array;
}
