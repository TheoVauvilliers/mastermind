<?php

namespace App\Enum;

enum KeyPegColorEnum: string
{
    case Found = 'black';
    case PartiallyFound = 'white';
    case NotFound = 'none';
}
