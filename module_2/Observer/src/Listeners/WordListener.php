<?php

namespace Observer\Listeners;

interface WordListener
{
    public function onWord(string $word): void;
}