<?php

use Composite\File;
use Composite\Directory;

require_once __DIR__ . '/src/File.php';
require_once __DIR__ . '/src/Directory.php';
require_once __DIR__ . '/src/FileSystemEntity.php';

$root = new Directory('root');
$dir1 = new Directory('dir1');
$dir2 = new Directory('dir2');
$file1 = new File('example.txt', 100);
$file2 = new File('example_2.txt', 200);

$root->add($dir1);
$root->add($dir2);
$dir1->add($file1);
$dir2->add($file2);

echo $root->getName() . PHP_EOL;
echo $root->getSize() . PHP_EOL;
echo $dir1->listContent()[0]->getName() . PHP_EOL;