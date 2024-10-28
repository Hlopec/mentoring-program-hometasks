<?php
class PersonRepositoryProxy implements PersonRepository
{
    private $realRepository;
    private $cache = [];

    public function __construct(PersonRepository $realRepository)
    {
        $this->realRepository = $realRepository;
    }

    public function readPerson(string $name): Person
    {
        if (isset($this->cache[$name])) {
            return $this->cache[$name];
        }

        $person = $this->realRepository->readPerson($name);

        $this->cache[$name] = $person;

        return $person;
    }
}