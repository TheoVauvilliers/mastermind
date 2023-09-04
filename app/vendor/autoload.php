<?php

function autoload($class)
{
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/src/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . spl_autoload_extensions();
    if (file_exists($file)) {
        require $file;
    }
}

spl_autoload_extensions('.php');
spl_autoload_register('autoload');
