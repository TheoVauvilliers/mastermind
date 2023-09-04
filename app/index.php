<?php

require_once 'vendor/autoload.php';

use App\Entity\Mastermind;

$mastermind = new Mastermind();
$mastermind->run();
