<?php
class Company
{
    private string $name;
    private array $employees = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function accept(ReportVisitor $visitor): void
    {
        $visitor->visitCompany($this);
    }
}