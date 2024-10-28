<?php
class FileSystemRepositoryFactory implements PersonRepositoryFactory
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function createPersonRepository(): PersonRepository
    {
        return new FileSystemPersonRepository($this->filePath);
    }
}