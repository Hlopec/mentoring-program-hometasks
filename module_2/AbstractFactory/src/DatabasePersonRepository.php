<?php
class DatabasePersonRepository implements PersonRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->initializeSchema();
    }

    private function initializeSchema(): void
    {
        $this->pdo->exec(
            "CREATE TABLE IF NOT EXISTS people (name TEXT PRIMARY KEY, age INTEGER)"
        );
    }

    public function savePerson(Person $person): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO people (name, age) VALUES (:name, :age)");
        $stmt->execute([
            'name' => $person->getName(),
            'age' => $person->getAge(),
        ]);
    }

    public function readPeople(): array
    {
        $stmt = $this->pdo->query("SELECT name, age FROM people");
        $peopleData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $people = [];
        foreach ($peopleData as $data) {
            $people[] = new Person($data['name'], $data['age']);
        }
        return $people;
    }

    public function readPerson(string $name): ?Person
    {
        $stmt = $this->pdo->prepare("SELECT name, age FROM people WHERE name = :name");
        $stmt->execute(['name' => $name]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new Person($data['name'], $data['age']);
        }
        return null;
    }
}