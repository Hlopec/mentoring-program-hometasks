<?php
class Person
{
    private $name;
    private $iq;

    public function __construct(string $name, int $iq = 100)
    {
        $this->name = $name;
        $this->iq = $iq;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIq(): int
    {
        return $this->iq;
    }

    public function changeIqByDelta(int $delta): void
    {
        $this->iq += $delta;
    }
}