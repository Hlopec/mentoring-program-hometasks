<?php
class FileStringCollection implements StringCollection
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getIterator(): StringIterator
    {
        return new FileStringIterator($this->filePath);
    }
}