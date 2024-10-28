<?php
interface PersonRepository {
    public function readPerson(string $name): Person;
}