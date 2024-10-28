<?php
class FileSystemPersonRepository implements PersonRepository
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function savePerson(Person $person): void
    {
        $people = $this->readPeople();
        $people[] = [
            'name' => $person->getName(),
            'age' => $person->getAge(),
        ];
        file_put_contents($this->filePath, json_encode($people));
    }

    public function readPeople(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }
        return json_decode(file_get_contents($this->filePath), true) ?? [];
    }

    public function readPerson(string $name): ?Person
    {
        $people = $this->readPeople();
        foreach ($people as $personData) {
            if ($personData['name'] === $name) {
                return new Person($personData['name'], $personData['age']);
            }
        }
        return null;
    }
}