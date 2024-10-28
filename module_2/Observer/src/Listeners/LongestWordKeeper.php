<?php

namespace Observer\Listeners;

class LongestWordKeeper implements WordListener {
    private ?string $longestWord = null;

    public function onWord(string $word): void {
        if ($this->longestWord === null || strlen($word) > strlen($this->longestWord)) {
            $this->longestWord = $word;
        }
    }

    public function getLongestWord(): ?string {
        return $this->longestWord;
    }
}