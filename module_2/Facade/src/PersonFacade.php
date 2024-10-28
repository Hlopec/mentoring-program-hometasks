<?php
class PersonFacade
{
    private $repository;

    public function __construct(PersonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function whoIsTheSmarter(string $person1Name, string $person2Name): Person
    {
        $person1 = $this->findPersonOrThrow($person1Name);
        $person2 = $this->findPersonOrThrow($person2Name);

        return $person1->getIq() >= $person2->getIq() ? $person1 : $person2;
    }

    public function transferIq(string $fromName, string $toName, int $amountToTransfer): void
    {
        $fromPerson = $this->findPersonOrThrow($fromName);
        $toPerson = $this->findPersonOrThrow($toName);

        $fromPerson->changeIqByDelta(-$amountToTransfer);
        $toPerson->changeIqByDelta($amountToTransfer);
    }

    public function changeIqByDelta(string $personName, int $delta): void
    {
        $person = $this->findPersonOrThrow($personName);
        $person->changeIqByDelta($delta);
    }

    private function findPersonOrThrow(string $name): Person
    {
        $person = $this->repository->findPersonByName($name);
        if ($person === null) {
            throw new Exception("Person $name not found");
        }
        return $person;
    }
}