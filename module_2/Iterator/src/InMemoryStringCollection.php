<?php
class InMemoryStringCollection implements StringCollection
{
    private $strings;

    public function __construct(array $strings)
    {
        $this->strings = $strings;
    }

    public function getIterator(): StringIterator
    {
        return new InMemoryStringIterator($this->strings);
    }
}