<?php
class IntegerStack implements IntegerStackInterface
{
    private array $stack = [];

    public function push(int $integer): void
    {
        array_push($this->stack, $integer);
    }

    public function pop(): int
    {
        if (empty($this->stack)) {
            throw new UnderflowException("Stack is empty.");
        }
        return array_pop($this->stack);
    }
}