<?php
require_once 'PersonRepository.php';
require_once 'Person.php';

class RealPersonRepository implements PersonRepository
{
    private $data = [
        'Andrii' => 'Andrii Andriiovych',
        'Ihor' => 'Ihor Ihorovych',
        'Vasyl' => 'Vasyl Vasyliovych'
    ];

    public function readPerson(string $name): Person
    {
        if (isset($this->data[$name])) {
            return new Person($this->data[$name]);
        } else {
            throw new \Exception("Person not found: $name");
        }
    }
}