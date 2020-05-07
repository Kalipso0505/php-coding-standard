<?php

declare(strict_types=1);

namespace Spaceemotion\PhpCodingStandard\Formatter;

class GithubActionFormatter extends ConsoleFormatter
{
    public function format(Result $result): void
    {
        echo '::add-matcher::' . __DIR__ . '/github-matcher.json' . "\n";

        foreach ($result->files as $fileName => $file) {
            echo "::group::{$fileName}\n";

            foreach ($file->violations as $violation) {
                $type = strtolower($violation->severity);
                echo "{$fileName}:{$violation->line} {$type} {$violation->message} ({$violation->tool})\n";
            }

            echo "::endgroup::\n";
        }
    }
}
