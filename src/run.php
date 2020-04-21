<?php

declare(strict_types=1);

/**
 * Runs the given command list in sequence.
 * On windows, the .bat file will be executed instead.
 *
 * @param string $command The raw binary name
 * @param string[] $arguments
 *
 * @return int The exit code of the command
 */
function run(string $command, array $arguments): int
{
    $joined = implode(' ', $arguments);

    $binary = PHPCSTD_BINARY_PATH . $command;

    if (PHP_OS_FAMILY === 'Windows') {
        $binary = "{$binary}.bat";
    }

    echo "-> {$command} {$joined}" . PHP_EOL;

    $exitCode = 0;

    passthru("{$binary} {$joined}", $exitCode);

    return $exitCode;
}
