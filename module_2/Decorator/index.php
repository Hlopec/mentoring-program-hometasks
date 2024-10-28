<?php
require_once __DIR__ . '/src/Person.php';
require_once __DIR__ . '/src/PersonRepository.php';
require_once __DIR__ . '/src/BasePersonRepository.php';
require_once __DIR__ . '/src/LowerCaseReadPersonDecorator.php';
require_once __DIR__ . '/src/UppercaseWritePersonDecorator.php';

$baseRepository = new BasePersonRepository();

$decoratedRepository = new LowerCaseReadPersonDecorator(
    new UppercaseWritePersonDecorator($baseRepository)
);

$person1 = new Person("Ihor", 20);
$person2 = new Person("Andrii", 21);

$decoratedRepository->savePerson($person1);
$decoratedRepository->savePerson($person2);

$people = $decoratedRepository->readPeople();
foreach ($people as $person) {
    echo $person->getName() . " - " . $person->getAge() . PHP_EOL;
}

$ihor = $decoratedRepository->readPerson("IHOR");
if ($ihor !== null) {
    echo "Found: " . $ihor->getName() . " - " . $ihor->getAge() . PHP_EOL;
}