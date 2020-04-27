<?php

declare(strict_types=1);

(static function (): void {
    // Find root "bin" folder for composer installation
    static $autoloadFile = 'vendor/autoload.php';

    for (
        $path = __DIR__ . '/', $level = 0;
        $level <= 3;
        $path .= '/..', $level++
    ) {
        if (file_exists("{$path}/{$autoloadFile}")) {
            define('PHPCSTD_ROOT', "{$path}/");
            define('PHPCSTD_BINARY_PATH', PHPCSTD_ROOT . 'vendor/bin/');

            break;
        }
    }

    if (! defined('PHPCSTD_ROOT')) {
        fwrite(STDERR, 'Vendor folder not found. Did you forget to run "composer install"?' . PHP_EOL);
        exit(1);
    }

    require_once __DIR__ . '/../vendor/autoload.php';
})();
