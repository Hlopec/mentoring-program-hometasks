<?php
class EmployeeCollection
{
    private array $employees = [];

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function sortEmployees(SortingStrategy $strategy): array
    {
        return $strategy->sort($this->employees);
    }
}