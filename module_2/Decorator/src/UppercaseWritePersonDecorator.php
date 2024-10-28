<?php
class UppercaseWritePersonDecorator implements PersonRepository
{
    private PersonRepository $repository;

    public function __construct(PersonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function savePerson(Person $person): void
    {
        $person->setName(strtoupper($person->getName()));
        $this->repository->savePerson($person);
    }

    public function readPeople(): array
    {
        return $this->repository->readPeople();
    }

    public function readPerson(string $name): ?Person
    {
        return $this->repository->readPerson($name);
    }
}