<?php

namespace App\Service;

class Speaker
{
    public static function round(string $text): void
    {
        echo 'Starting round ' . $text . PHP_EOL;
    }

    public static function result(string $text): void
    {
        echo 'You ' . $text . ' this game' . PHP_EOL;
    }

    public static function annonceKeyPegs(array $keyPegs): void
    {
        $stringifyKeyPegs = '';

        foreach($keyPegs as $key => $value) {
            $stringifyKeyPegs .= $value;

            if ($key !== count($keyPegs) - 1) {
                $stringifyKeyPegs .= ', ';
            }
        }

        echo 'Key pegs : ' . $stringifyKeyPegs . PHP_EOL;
    }
}
