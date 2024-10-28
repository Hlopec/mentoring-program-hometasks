<?php

require_once __DIR__ . '/src/Superman.php';

$superman1 = Superman::getInstance();
$superman1->saveTheWorld();

$superman2 = Superman::getInstance();

if ($superman1 === $superman2) {
    echo "only one Superman!\n";
}