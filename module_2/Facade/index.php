<?php
require_once __DIR__ . '/src/Person.php';
require_once __DIR__ . '/src/PersonRepository.php';
require_once __DIR__ . '/src/RealPersonRepository.php';
require_once __DIR__ . '/src/PersonFacade.php';

$repository = new RealPersonRepository();
$facade = new PersonFacade($repository);

$smarterPerson = $facade->whoIsTheSmarter("Andrii", "Ivan");
echo $smarterPerson->getName() . " is smarter with IQ " . $smarterPerson->getIq() . PHP_EOL;

$facade->transferIq("Andrii", "Ivan", 10);
echo "Ivan has an IQ " . $repository->findPersonByName("Ivan")->getIq() . PHP_EOL;

$facade->changeIqByDelta("Vasyl", 5);
echo "Vasyl has IQ " . $repository->findPersonByName("Vasyl")->getIq() . PHP_EOL;
