<?php

namespace Observer\Listeners;

class ReverseWord implements WordListener {
    public function onWord(string $word): void {
        echo strrev($word) . PHP_EOL;
    }
}