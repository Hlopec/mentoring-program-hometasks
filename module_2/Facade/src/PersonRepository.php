<?php
interface PersonRepository
{
    public function findPersonByName(string $name): ?Person;
}