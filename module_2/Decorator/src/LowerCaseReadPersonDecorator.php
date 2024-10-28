<?php
class LowerCaseReadPersonDecorator implements PersonRepository
{
    private PersonRepository $repository;

    public function __construct(PersonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function savePerson(Person $person): void
    {
        $this->repository->savePerson($person); // No modification when saving
    }

    public function readPeople(): array
    {
        $people = $this->repository->readPeople();
        foreach ($people as $person) {
            $person->setName(strtolower($person->getName()));
        }
        return $people;
    }

    public function readPerson(string $name): ?Person
    {
        $person = $this->repository->readPerson($name);
        if ($person !== null) {
            $person->setName(strtolower($person->getName()));
        }
        return $person;
    }
}