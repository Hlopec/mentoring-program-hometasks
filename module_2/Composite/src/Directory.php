<?php
namespace Composite;
class Directory implements FileSystemEntity
{
    private string $name;
    private array $contents = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int

    {
        return array_reduce($this->contents, function ($sum, FileSystemEntity $entity) {
        return $sum + $entity->getSize();
    }, 0);
}

    public function add(FileSystemEntity $fsEntity): void
    {
        $this->contents[] = $fsEntity;
    }

    public function remove(FileSystemEntity $fsEntity): void
    {
        $key = array_search($fsEntity, $this->contents, true);
        if ($key !== false) {
            unset($this->contents[$key]);
        }
    }

    public function listContent(): array
    {
        return $this->contents;
    }
}