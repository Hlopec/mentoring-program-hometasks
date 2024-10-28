<?php

namespace Observer\Listeners;

class NumberCounter implements WordListener {
    private int $count = 0;

    public function onWord(string $word): void {
        if (is_numeric($word)) {
            $this->count++;
        }
    }

    public function getCount(): int {
        return $this->count;
    }
}