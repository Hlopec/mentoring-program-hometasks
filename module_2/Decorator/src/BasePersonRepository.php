<?php
class BasePersonRepository implements PersonRepository
{
    private array $people = [];

    public function savePerson(Person $person): void
    {
        $this->people[$person->getName()] = $person;
    }

    public function readPeople(): array
    {
        return array_values($this->people);
    }

    public function readPerson(string $name): ?Person
    {
        return $this->people[$name] ?? null;
    }
}