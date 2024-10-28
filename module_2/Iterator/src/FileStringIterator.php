<?php
class FileStringIterator implements StringIterator
{
    private $fileHandle;
    private $currentLine;

    public function __construct($filePath)
    {
        $this->fileHandle = fopen($filePath, 'r');
        $this->currentLine = fgets($this->fileHandle);
    }

    public function hasNext(): bool
    {
        return $this->currentLine !== false;
    }

    public function getNext(): ?string
    {
        $line = $this->currentLine;
        if ($this->hasNext()) {
            $this->currentLine = fgets($this->fileHandle);
        }
        return $line !== false ? trim($line) : null;
    }

    public function __destruct()
    {
        if ($this->fileHandle) {
            fclose($this->fileHandle);
        }
    }
}