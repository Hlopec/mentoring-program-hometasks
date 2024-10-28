<?php
class InMemoryStringIterator implements StringIterator
{
    private $strings;
    private $position = 0;

    public function __construct(array $strings)
    {
        $this->strings = $strings;
    }

    public function hasNext(): bool
    {
        return $this->position < count($this->strings);
    }

    public function getNext(): ?string
    {
        if ($this->hasNext()) {
            return $this->strings[$this->position++];
        }
        return null;
    }
}