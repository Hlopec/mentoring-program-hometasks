<?php

require_once __DIR__ . '/src/IntegerStackInterface.php';
require_once __DIR__ . '/src/ASCIIStackInterface.php';
require_once __DIR__ . '/src/IntegerStack.php';
require_once __DIR__ . '/src/ASCIIToIntegerStackAdapter.php';

$integerStack = new IntegerStack();

$asciiStack = new ASCIIToIntegerStackAdapter($integerStack);

$asciiStack->push('U');
$asciiStack->push('K');
$asciiStack->push('I');

echo $asciiStack->pop() . PHP_EOL;
echo $asciiStack->pop() . PHP_EOL;
echo $asciiStack->pop() . PHP_EOL;