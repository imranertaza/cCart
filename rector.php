<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;

return static function (RectorConfig $rectorConfig): void {
    // Paths to scan
    $rectorConfig->paths([
        __DIR__ . '/app',
    ]);

    // Set rules / sets you want to apply
    $rectorConfig->rules([
        InlineConstructorDefaultToPropertyRector::class,
    ]);

    // Optional: skip some files
    $rectorConfig->skip([
        __DIR__ . '/vendor',
    ]);
};
