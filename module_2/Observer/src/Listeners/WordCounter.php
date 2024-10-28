<?php

namespace Observer\Listeners;

class WordCounter implements WordListener
{
    private int $count = 0;

    public function onWord(string $word): void
    {
        $this->count++;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}