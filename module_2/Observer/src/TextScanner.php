<?php

namespace Observer;

use Observer\Listeners\WordListener;

class TextScanner
{
    private array $listeners = [];

    public function addListener(WordListener $listener): void
    {
        $this->listeners[] = $listener;
    }

    public function scanFile(string $filePath): void
    {
        if (!file_exists($filePath)) {
            throw new \Exception("File not found: $filePath");
        }

        $file = fopen($filePath, 'r');

        while (($line = fgets($file)) !== false) {
            $words = preg_split('/\s+/', trim($line));
            foreach ($words as $word) {
                foreach ($this->listeners as $listener) {
                    $listener->onWord($word);
                }
            }
        }

        fclose($file);
    }
}