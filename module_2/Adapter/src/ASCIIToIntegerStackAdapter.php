<?php
class ASCIIToIntegerStackAdapter implements ASCIIStackInterface
{
    private IntegerStackInterface $integerStack;

    public function __construct(IntegerStackInterface $integerStack)
    {
        $this->integerStack = $integerStack;
    }

    public function push(string $char): void
    {
        if (strlen($char) !== 1) {
            throw new InvalidArgumentException("Only single characters are allowed.");
        }
        $asciiValue = ord($char);
        $this->integerStack->push($asciiValue);
    }

    public function pop(): ?string
    {
        try {
            $asciiValue = $this->integerStack->pop();
            return chr($asciiValue);
        } catch (UnderflowException $e) {
            return null;
        }
    }
}