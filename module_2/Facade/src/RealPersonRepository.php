<?php
class RealPersonRepository implements PersonRepository
{
    private $persons = [];

    public function __construct()
    {
        $this->persons[] = new Person("Andrii", 120);
        $this->persons[] = new Person("Ivan", 90);
        $this->persons[] = new Person("Vasyl", 110);
    }

    public function findPersonByName(string $name): ?Person
    {
        foreach ($this->persons as $person) {
            if ($person->getName() === $name) {
                return $person;
            }
        }
        return null;
    }
}