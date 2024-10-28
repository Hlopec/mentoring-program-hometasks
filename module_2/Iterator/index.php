<?php
require_once __DIR__ . '/src/StringIterator.php';
require_once __DIR__ . '/src/StringCollection.php';
require_once __DIR__ . '/src/InMemoryStringIterator.php';
require_once __DIR__ . '/src/InMemoryStringCollection.php';
require_once __DIR__ . '/src/FileStringIterator.php';
require_once __DIR__ . '/src/FileStringCollection.php';


$inMemoryCollection = new InMemoryStringCollection(["Hi", "WordPress", "Laravel", "PHP"]);
$iterator = $inMemoryCollection->getIterator();

while ($iterator->hasNext()) {
    echo $iterator->getNext() . PHP_EOL;
}

$fileCollection = new FileStringCollection('example.txt');
$fileIterator = $fileCollection->getIterator();

while ($fileIterator->hasNext()) {
    echo $fileIterator->getNext() . PHP_EOL;
}