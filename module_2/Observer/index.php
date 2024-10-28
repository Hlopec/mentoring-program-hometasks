<?php

require_once __DIR__ . '/src/TextScanner.php';
require_once __DIR__ . '/src/Listeners/WordListener.php';
require_once __DIR__ . '/src/Listeners/WordCounter.php';
require_once __DIR__ . '/src/Listeners/NumberCounter.php';
require_once __DIR__ . '/src/Listeners/LongestWordKeeper.php';
require_once __DIR__ . '/src/Listeners/ReverseWord.php';

use Observer\TextScanner;
use Observer\Listeners\WordCounter;
use Observer\Listeners\NumberCounter;
use Observer\Listeners\LongestWordKeeper;
use Observer\Listeners\ReverseWord;

$scanner = new TextScanner();

$wordCounter = new WordCounter();
$numberCounter = new NumberCounter();
$longestWordKeeper = new LongestWordKeeper();
$reverseWord = new ReverseWord();

$scanner->addListener($wordCounter);
$scanner->addListener($numberCounter);
$scanner->addListener($longestWordKeeper);
$scanner->addListener($reverseWord);

$filePath = 'example.txt';
$scanner->scanFile($filePath);

echo "Total: " . $wordCounter->getCount() . PHP_EOL;
echo "Numbers: " . $numberCounter->getCount() . PHP_EOL;
echo "Longest Word: " . $longestWordKeeper->getLongestWord() . PHP_EOL;