<?php
interface PersonRepositoryFactory
{
    public function createPersonRepository(): PersonRepository;
}