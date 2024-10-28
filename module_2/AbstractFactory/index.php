<?php
require_once __DIR__ . '/src/Person.php';
require_once __DIR__ . '/src/PersonRepository.php';
require_once __DIR__ . '/src/FileSystemPersonRepository.php';
require_once __DIR__ . '/src/DatabasePersonRepository.php';
require_once __DIR__ . '/src/PersonRepositoryFactory.php';
require_once __DIR__ . '/src/FileSystemRepositoryFactory.php';
require_once __DIR__ . '/src/DatabaseRepositoryFactory.php';

echo "option: 1 File System, 2 Database: ";
$choice = trim(fgets(STDIN));

if ($choice == 1) {
    $factory = new FileSystemRepositoryFactory(__DIR__ . '/data/people.json');
} elseif ($choice == 2) {
    $pdo = new \PDO('sqlite:' . __DIR__ . '/data/people.db');
    $factory = new DatabaseRepositoryFactory($pdo);
} else {
    echo "Invalid choice" . PHP_EOL;
    exit(1);
}

$repository = $factory->createPersonRepository();

$repository->savePerson(new Person("Andrii", 20));
$repository->savePerson(new Person("Ihor", 21));

$people = $repository->readPeople();
foreach ($people as $person) {
    echo $person->getName() . " - " . $person->getAge() . " years old" . PHP_EOL;
}

$ihor = $repository->readPerson("Ihor");
if ($ihor !== null) {
    echo "Found: " . $ihor->getName() . " - " . $ihor->getAge() . " years old" . PHP_EOL;
}