<?php
class DatabaseRepositoryFactory implements PersonRepositoryFactory
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createPersonRepository(): PersonRepository
    {
        return new DatabasePersonRepository($this->pdo);
    }
}