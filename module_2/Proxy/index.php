<?php

require_once __DIR__ . '/src/PersonRepository.php';
require_once __DIR__ . '/src/Person.php';
require_once __DIR__ . '/src/PersonRepositoryProxy.php';
require_once __DIR__ . '/src/RealPersonRepository.php';
$realRepository = new RealPersonRepository();

$repositoryProxy = new PersonRepositoryProxy($realRepository);

$person1 = $repositoryProxy->readPerson("Andrii");
echo $person1->getName() . PHP_EOL;

$person2 = $repositoryProxy->readPerson("Ivan");
echo $person2->getName() . PHP_EOL;

$person3 = $repositoryProxy->readPerson("Vasyl");
echo $person3->getName() . PHP_EOL;